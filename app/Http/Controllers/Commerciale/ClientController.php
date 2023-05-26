<?php

namespace App\Http\Controllers\Commerciale;

use App\Models\Client;
use App\Models\Formule;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('commerciale.clients.index');
    }


    public function store(Request $request, Client $client)
    {
        
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->entreprise = $request->entreprise;
        $client->telephone = $request->phone;
        $client->email = $request->email;
        $client->adresse = $request->adresse; 
        $client->user_id = Auth::user()->id;
        $client->formule_id = $request->formule_id;
        $client->abonnement_id = $request->abonnement_id;

        $client->save();
        return redirect()->back()->with('success', 'Client ajouté avec succès');
    }

   public function edit($id)
   {
       $client = Client::find($id);
       $formules = Formule::all();
       $abonnements = Abonnement::all();
       return  view('commerciale.clients.edit', compact('client', 'formules', 'abonnements'));
       
   }

   public function update(Request $request,$id)
   {
    $client = Client::find($id);
       $client->nom = $request->nom;
       $client->prenom = $request->prenom;
       $client->entreprise = $request->entreprise;
       $client->telephone = $request->phone;
       $client->email = $request->email;
       $client->adresse = $request->adresse; 
       $client->user_id = Auth::user()->id;
       $client->formule_id = $request->formule_id;
       $client->abonnement_id = $request->abonnement_id;

       $client->save();

       return redirect()->route('commerciale.clients');
   }

   public function delete($id)
   {
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('commerciale.clients');
   }
}
