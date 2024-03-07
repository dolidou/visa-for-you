@extends('layout')

@section('title', 'Accueil')

@section('content')
<style>
   .text-purple {
    color: white !important;
    font-weight: bold;
    font-size: 24px; /* Taille de police personnalisée */

}
.bg-custom {
    /* background: linear-gradient(135deg, #000000, #3533cd); */
    background-color: #3c205d;

}
</style>
<div class="row justify-content align-items-center vh-50" >
    <div class="col-3">
        <div class="card text-purple bg-transparent">
            <div class="card-body">
                <h2 class="card-title text-purple">Bienvenue dans le portail des RDV de visa.</h2>
                <p class="card-text text-purple">Nous proposons divers RDV de visa pour l'espace Schengen. Nous prenons également en charge tous les dossiers pour le visa électronique. Suivez ce lien pour commencer à prendre votre rendez-vous :</p>
                <a href="/rdv" class="btn btn-primary">Prendre un RDV</a>
            </div>
        </div>
    </div>
    
</div>
@endsection