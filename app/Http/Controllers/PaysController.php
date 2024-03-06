<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pays;
use App\Models\TypeVisa;



class PaysController extends Controller
{
    public function index()
    {
        $Pays = Pays::all();
        $allTypesVisa=TypeVisa::all();
        return view('visa.pays', compact('Pays','allTypesVisa'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:type_visas',
            'libelle' => 'required|string',
           
        ]);

        Pays::create([
            'code' => $request->code,
            'libelle' => $request->libelle,
        ]);

        return redirect()->route('pays.index')->with('success', 'pays enregistré avec succès');
    }

    public function edit(Pays $Pays)
    {
        
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required|string',
            'libelle' => 'required',
           
        ]);

       
        Pays::whereId($id)->update($validatedData);

        return redirect()->route('pays.index')->with('success', 'Pays mis à jour avec succès');
    }

    public function destroy($id)
    {
       
        
        Pays::whereId($id)->delete();
       

        return redirect()->route('pays.index')->with('success', 'Pays supprimé avec succès');
    }

    public function ajouterTypeVisa(Request $request, Pays $pays)
{
    $pays->typesVisa()->attach($request->type_visa_id);
    return redirect()->back()->with('success', 'Type de visa ajouté avec succès');
}

}
