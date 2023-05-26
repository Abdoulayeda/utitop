<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbonnementController extends Controller
{
    
    public function index()
    {
        $abonnements = Abonnement::all();
        return view('admin.abonnement.index', compact('abonnements'));
    }

    public function store(Request $request, Abonnement $abonnement)
    {
      //  return $request;
        $abonnement->type = $request->type;
        $abonnement->nombres_mois = $request->nombres_mois;
        $abonnement->slug = uniqid().''.rand(823124,27386521);
        $abonnement->save();
    
        return redirect()->back();
        
    }

    public function delete($id)
    {
        $abonnement = Abonnement::find($id);
        $abonnement->delete();

        return redirect()->back();

    }
}
