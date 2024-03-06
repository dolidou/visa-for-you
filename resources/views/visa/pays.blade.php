@extends('layout')

@section('title', 'RDV')

@section('content')
    <div class="container">
        <style>
            .btn-purple {
                color: #fff;
                background-color: #800080;
                /* Couleur violette */
                border-color: #800080;
                /* Couleur de la bordure */
            }

            .btn-purple:hover {
                color: #fff;
                background-color: #6a006a;
                /* Couleur violette foncée au survol */
                border-color: #6a006a;
                /* Couleur de la bordure au survol */
            }
        </style>
        <h1>Liste des Pays</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Liste des pays</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    Créer un pays
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="paysTable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Libelle</th>
                                <th class="col-3">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Pays as $pays)
                                <tr>
                                    <td>{{ $pays->code }}</td>
                                    <td>{{ $pays->libelle }}</td>
                                    <td class="project-actions text-left d-flex ">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modal-default{{ $pays->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <div class="modal fade" id="modal-default{{ $pays->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" action="{{ route('pays.update', $pays->id) }}"
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
                                                                <input type="text" class="form-control" name="code"
                                                                    id="codetype" value="{{ $pays->code }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Libelle</label>
                                                                <input type="text" class="form-control" name="libelle"
                                                                    id="libelletype" value="{{ $pays->libelle }}">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-info"
                                                                data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-info">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <a class="btn btn-danger btn-sm" href="#deletetypeModal{{ $pays->id }}"
                                            class="delete" data-toggle="modal">
                                            <i class="fas fa-trash" data-toggle="tooltip" title="Supprimer"></i>
                                        </a>

                                        <form action="{{ route('pays.destroy', $pays->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Delete Modal HTML -->
                                            <div id="deletetypeModal{{ $pays->id }}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Supprimer type</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Etes vous sur de vouloir supprimer ce type :
                                                                {{ $pays->libelle }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default"
                                                                data-dismiss="modal" value="Annuler">
                                                            <input type="submit" class="btn btn-danger" value="Supprimer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-purple" data-toggle="modal"
                                            data-target="#visaModal{{ $pays->id }}">
                                            <i class="fas fa-plane-departure"></i> Type Visa </button>
                                            <div class="modal fade" id="visaModal{{ $pays->id }}" tabindex="-1" role="dialog" aria-labelledby="visaModalLabel{{ $pays->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="visaModalLabel{{ $pays->id }}">Types de visa pour {{ $pays->libelle }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h6>Ajouter un type de visa</h6>
                                                                    <form action="{{ route('pays.ajouter-type-visa', $pays->id) }}" method="POST">
                                                                        @csrf
                                                                        <div class="input-group mb-3">
                                                                            <select class="custom-select" name="type_visa_id" id="inputGroupSelect04">
                                                                                <option selected>Choisir...</option>
                                                                                @foreach($allTypesVisa as $typeVisa)
                                                                                    <option value="{{ $typeVisa->id }}">{{ $typeVisa->libelle }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Code</th>
                                                                        <th>Libellé</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($pays->typesVisa as $typeVisa)
                                                                        <tr>
                                                                            <td>{{ $typeVisa->code }}</td>
                                                                            <td>{{ $typeVisa->libelle }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
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
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Créer un Type de Visa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pays.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        <div class="form-group">
                            <label for="libelle">Libelle</label>
                            <input type="text" class="form-control" id="libelle" name="libelle" required>
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
        $(document).ready(function() {
            $('#paysTable').DataTable();
        });
    </script>
@endsection
