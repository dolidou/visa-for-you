<!-- resources/views/welcome.blade.php -->

@extends('layout')

@section('title', 'LISTE RDV')

@section('content')
    <h1>Welcome to my List!</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous en cours</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#listeAcceptesModal">
                Voir les rendez-vous acceptés
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N° de passeport</th>
                            <th>Date RDV</th>
                            <th>Nom du client</th>
                            <th>Pays</th>
                            <th class="w-25">Type RDV</th>
                            <th>Fichier Joints</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Numéro de passeport</th>
                            <th>Date du rendez-vous</th>
                            <th>Nom du client</th>
                            <th>Pays</th>
                            <th>Type de rendez-vous</th>
                            <th>Fichier Joints</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($rdvs->where('etat', 0) as $rdv)
                            <tr>
                                <td>{{ $rdv->num_passport }}</td>
                                <td>{{ $rdv->date_rdv }}</td>
                                <td>{{ $rdv->client->nom }}</td>
                                <td>{{ $rdv->pays->libelle }}</td>
                                <td>{{ $rdv->typeVisa->libelle }}</td>
                                <td>  @foreach($rdv->uploads as $upload)
                                    <a href="{{ route('listerdv.download', ['id' => $upload->id]) }}" download>{{ $upload->nom_fichier }}</a><br>
                                @endforeach</td>
                                <td>En cours</td>
                                <td>
                                    <form id="confirmerRdvForm" action="{{ route('listerdv.update', $rdv->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                    </form>
                                    <form id="refuserRdvForm" action="{{ route('listerdv.destroy', $rdv->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="listeAcceptesModal" tabindex="-1" role="dialog" aria-labelledby="listeAcceptesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listeAcceptesModalLabel">Liste des rendez-vous acceptés</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableAcceptes" cellspacing="0">
                        <thead>
                            <tr>
                                <th>N° de passeport</th>
                                <th>Date RDV</th>
                                <th>Nom du client</th>
                                <th>prénom</th>
                                <th>N° tel</th>
                                <th>email</th>
                                <th>Pays</th>
                                <th>Type RDV</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N° de passeport</th>
                                <th>Date RDV</th>
                                <th>Nom du client</th>
                                <th>prénom</th>
                                <th>N° tel</th>
                                <th>email</th>
                                <th>Pays</th>
                                <th>Type RDV</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($rdvs->where('etat', 1) as $rdv)
                                <tr>
                                    <td>{{ $rdv->num_passport }}</td>
                                    <td>{{ $rdv->date_rdv }}</td>
                                    <td>{{ $rdv->client->nom }}</td>
                                    <td>{{ $rdv->client->prenom }}</td>
                                    <td>{{ $rdv->client->num_tel }}</td>
                                    <td>{{ $rdv->client->email }}</td>
                                    <td>{{ $rdv->pays->libelle }}</td>
                                    <td>{{ $rdv->typeVisa->libelle }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

   


@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#confirmerRdvForm button[type="submit"]').addEventListener('click', function(
            e) {
                e.preventDefault(); // Empêcher le comportement par défaut du bouton
                document.querySelector('#confirmerRdvForm').submit(); // Soumettre le formulaire
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#refuserRdvForm button[type="submit"]').addEventListener('click', function(e) {
                e.preventDefault(); // Empêcher le comportement par défaut du bouton
                document.querySelector('#refuserRdvForm').submit(); // Soumettre le formulaire
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTableAcceptes').DataTable({
                searching: true,
                paging: false,
                info: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });
        });
    </script>
    
@endsection
