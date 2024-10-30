@extends('layout')

@section('title','Contact')

@section('content')
<style>
    
        .bg-custom {
            /* background: linear-gradient(135deg, #000000, #737373); */
            /* background-color: #a73f7d; */
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%);
        }
        label {
            color: white; /* Couleur du texte en blanc */
        }
    
</style>
<div class="row justify-content-center align-items-center vh-100">
    <div class="col-8">
        <div class="card bg-custom">
            <div class="card-body">
                <h5 class="card-title text-white text-center mb-4">Coordonnées</h5>
                <ul class="list-unstyled text-white">
                    <li class="mb-3">
                        <i class="fas fa-phone-alt"></i> Téléphone: +1 234 567 890
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-envelope"></i> Email: contact@h-travel.com
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i> Localisation: 123 Rue Principale, Ville, Pays
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection