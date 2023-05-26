<?php

namespace App\Http\Controllers\Admin;

use App\Models\Formule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormuleController extends Controller
{
    public function index()
    {
        $formules = Formule::all();
        return view('admin.formule.index', compact('formules'));
    }

    public function store(Request $request, Formule $formule)
    {
        $request->validate([
            'type' => 'required',
            'tarif' => 'required',
        ]);

        $formule->type_formule = $request->type;
        $formule->tarif = $request->tarif;
        $formule->slug = uniqid().''.rand(8, 20);
        $formule->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $formule = Formule::find($id);
        $formule->delete();

        return redirect()->back();
        
    }
}
