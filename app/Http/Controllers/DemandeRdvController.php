<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pays;
use App\Models\DemandeRdv;
use App\Models\Disponibilite;
use App\Models\Client;
use App\Models\Statut;
use App\Models\Upload;




class DemandeRdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $paysnormal=Pays::select('pays.id','pays.code as code_pays','pays.libelle')
                 ->distinct()
                  ->where('type_visas.visa','normal')
                  ->Join('pays_type_visa','pays_type_visa.pays_id','pays.id')
                  ->Join('type_visas','pays_type_visa.type_visa_id','type_visas.id')
                  ->get();
        $payselectronique=Pays::select('pays.id','pays.code as code_pays','pays.libelle')
                 ->distinct()
                  ->where('type_visas.visa','electronique')
                  ->Join('pays_type_visa','pays_type_visa.pays_id','pays.id')
                  ->Join('type_visas','pays_type_visa.type_visa_id','type_visas.id')
                  ->get();
        // dd($pays);
       return view('visa.rdv',compact('paysnormal','payselectronique'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'num_tel' => 'required|string',
        'email' => 'required|email',
        'num_passport' => 'required|string',
        'date_rdv' => 'required|date',
        'pays_id' => 'required|exists:pays,id',
        'type_visa_id' => 'required|exists:type_visas,id'
    ]);
//  dd($request->pays_id,$request->type_visa_id);
    $client = Client::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'num_tel' => $request->num_tel,
        'email' => $request->email
    ]);

    $demandeRdv = DemandeRdv::create([
        'num_passport' => $request->num_passport,
        'date_rdv' => $request->date_rdv,
        'client_id' => $client->id,
        'pays_id' => $request->pays_id,
        'type_visa_id' => $request->type_visa_id
    ]);

    // Créer un statut pour la demande de RDV
    $statut = Statut::create([
        'demande_rdv_id' => $demandeRdv->id,
        'code' => '01', // En cours
        'situation' => 'En cours'
    ]);

    // if ($request->hasFile('upload')) {
    //     $file = $request->file('upload');
    //     $fileName = $file->getClientOriginalName();
    //     $filePath = $file->store('uploads');
    
    //     $upload = Upload::create([
    //         'demande_rdv_id' => $demandeRdv->id,
    //         'nom_fichier' => $fileName,
    //         'chemin' => $filePath
    //     ]);
// }
// dd($request->uploads);
if ($request->hasFile('uploads')) {
    $files = $request->file('uploads');
    foreach ($files as $file) {
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename);
            $publicPath = public_path(); // Récupérer le chemin vers le répertoire "public"
            $filePath = str_replace(public_path(), '', $path); // Supprimer le répertoire public du chemin



            $upload = new Upload();
            $upload->nom_fichier = $filename;
            $upload->demande_rdv_id = $demandeRdv->id;
            $upload->chemin = ltrim($filePath, DIRECTORY_SEPARATOR); // Supprimer le séparateur de répertoire initial au besoin et enregistrer le chemin dans la base de données
            $upload->save();

            // Autres opérations nécessaires avec le fichier uploadé
        }
    }
    // Autres opérations nécessaires avec le fichier uploadé
}


    return redirect()->route('demanderdv.index')->with('success', 'Votre demande de RDV a été enregistrée avec succès.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getVisaTypes($pays_id)
{
    $visaTypes = Pays::find($pays_id)->typeVisas()->pluck('libelle', 'type_visas.id');
    return response()->json($visaTypes);
}

public function checkRdvExists(Request $request)
{
    
    $exists = DemandeRdv::where('num_passport', $request->num_passport)
    ->where('type_visa_id', $request->type_visa_id)
    ->where('pays_id', $request->pays_id)
    ->where('etat', '0')
    ->exists();


    // dd($exists,$request->num_passport);
    return response()->json(['exists' => $exists]);
}

public function getDisponibilites($type_visa_id, $pays_id)
{
    $disponibilites = Disponibilite::where('type_visa_id', $type_visa_id)
                                   ->where('pays_id', $pays_id)
                                   ->get();

    return response()->json($disponibilites);
}


}
