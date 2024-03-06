@extends('layout')

@section('title', 'RDV')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Liste des types de visa</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Créer un type de visa
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="typeVisaTable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Libelle</th>
                            <th>Visa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($typeVisa as $tv)
                        <tr>
                            <td>{{ $tv->code }}</td>
                            <td>{{ $tv->libelle }}</td>
                            <td>{{ $tv->visa }}</td>
                            
                                <td class="project-actions text-left">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#modal-default{{ $tv->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <div class="modal fade" id="modal-default{{ $tv->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post"
                                                    action="{{ route('type_visa.update', $tv->id) }}"
                                                    autocomplete="off" class="form-horizontal">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modifier type</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Code</label>
                                                            <input type="text" class="form-control"
                                                                name="code" id="codetype"
                                                                value="{{ $tv->code }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Libelle</label>
                                                            <input type="text" class="form-control"
                                                                name="libelle" id="libelletype"
                                                                value="{{ $tv->libelle }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="visa">Visa</label>
                                                            <select class="form-control" id="visa" name="visa"  value="{{ $tv->visa }}">
                                                                <option value="normal">Normal</option>
                                                                <option value="electronique">Électronique</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-info"
                                                            data-dismiss="modal">Fermer</button>
                                                        <button type="submit"
                                                            class="btn btn-info">Enregistrer</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
            
                                    <a class="btn btn-danger btn-sm"
                                        href="#deletetypeModal{{ $tv->id }}" class="delete"
                                        data-toggle="modal">
                                        <i class="fas fa-trash" data-toggle="tooltip" title="Supprimer"></i>
                                    </a>
            
                                    <form action="{{ route('type_visa.destroy', $tv->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Delete Modal HTML -->
                                        <div id="deletetypeModal{{ $tv->id }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Supprimer type</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Etes vous sur de vouloir supprimer ce type : {{ $tv->libelle }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default"
                                                            data-dismiss="modal" value="Annuler">
                                                        <input type="submit" class="btn btn-danger"
                                                            value="Supprimer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
            
        </div>
    </div>   
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Créer un Type de Visa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('type_visa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" id="libelle" name="libelle" required>
                    </div>
                    <div class="form-group">
                        <label for="visa">Visa</label>
                        <select class="form-control" id="visa" name="visa" required>
                            <option value="normal">Normal</option>
                            <option value="electronique">Électronique</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Modal, Edit Modal, Delete Modal -->




@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#typeVisaTable').DataTable();
    });
</script>
@endsection