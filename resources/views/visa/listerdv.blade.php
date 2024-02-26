<!-- resources/views/welcome.blade.php -->

@extends('layout')

@section('title', 'LISTE RDV')

@section('content')
    <h1>Welcome to my List!</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous en cours</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Numéro de passeport</th>
                            <th>Date du rendez-vous</th>
                            <th>Nom du client</th>
                            <th>Pays</th>
                            <th>Type de rendez-vous</th>
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
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($rdvs as $rdv)
                            <tr>
                                <td>{{ $rdv->num_passport }}</td>
                                <td>{{ $rdv->date_rdv }}</td>
                                <td>{{ $rdv->client->nom }}</td>
                                <td>{{ $rdv->pays->libelle }}</td>
                                <td>{{ $rdv->typeVisa->libelle }}</td>
                                <td>{{$rdv->statuts->last()->situation}}</td>
                                <td>
                                    <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



@endsection
