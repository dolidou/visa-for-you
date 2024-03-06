<?php

namespace App\Http\Controllers;
use App\Models\TypeVisa;

use Illuminate\Http\Request;

class TypeVisaController extends Controller
{
    public function index()
    {
        $typeVisa = TypeVisa::all();
        return view('visa.typevisa', compact('typeVisa'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:type_visas',
            'libelle' => 'required|string',
            'visa' =>'required|string',
        ]);

        TypeVisa::create([
            'code' => $request->code,
            'libelle' => $request->libelle,
            'visa' => $request->visa,
        ]);

        return redirect()->route('type_visa.index')->with('success', 'Type de visa enregistré avec succès');
    }

    public function edit(TypeVisa $typeVisa)
    {
        
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required|string',
            'libelle' => 'required',
            'visa' => 'required',
        ]);

       
        TypeVisa::whereId($id)->update($validatedData);

        return redirect()->route('type_visa.index')->with('success', 'Type de visa mis à jour avec succès');
    }

    public function destroy($id)
    {
       
        
        TypeVisa::whereId($id)->delete();
       

        return redirect()->route('type_visa.index')->with('success', 'Type de visa supprimé avec succès');
    }
}
