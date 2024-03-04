<?php

namespace App\Http\Controllers;
use App\Models\DemandeRdv;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ListeRdvController extends Controller
{
    public function index()
    {
        // Récupérer les rendez-vous en cours avec les informations nécessaires
        // $rdvs = DemandeRdv::select('demande_rdvs.*', 'clients.nom AS nom_client', 'pays.libelle AS nom_pays', 'type_visas.libelle AS type_visa', 'statuts.situation AS statut')
        //     ->join('clients', 'demande_rdvs.client_id', '=', 'clients.id')
        //     ->join('pays', 'demande_rdvs.pays_id', '=', 'pays.id')
        //     ->join('type_visas', 'demande_rdvs.type_visa_id', '=', 'type_visas.id')
        //     ->join('statuts', 'demande_rdvs.id', '=', 'statuts.demande_rdv_id')
        //     ->where('statuts.code', '=', '01')
        //     ->orderBy('statuts.created_at', 'desc')
        //     ->get();

        $rdvs= DemandeRdv::all();

        return view('visa.listerdv', compact('rdvs'));
    }

    public function update($id)
    {
      

        DemandeRdv::whereId($id)->update(['etat' => 1]);

        return redirect()->route('listerdv.index')->with('success', 'rdv mis à jour avec succès');

    }

    public function destroy($id)
    {
        DemandeRdv::whereId($id)->update(['etat' => 2]);

        return redirect()->route('listerdv.index')->with('success', 'rdv mis à jour avec succès');
    }

    public function downloadFile($id)
{
    $upload = Upload::find($id);

    if (!$upload) {
        return redirect()->back()->with('error', 'Fichier introuvable.');
    }

    $filePath = storage_path('app/uploads/' . $upload->nom_fichier);

    return response()->download($filePath, $upload->nom_fichier);
}
}
