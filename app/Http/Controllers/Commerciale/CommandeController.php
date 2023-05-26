<?php

namespace App\Http\Controllers\Commerciale;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BonCommande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    
    private function getFirstLetter($name)
    {
        return substr($name, 0,1);
    }

    public function create($id)
    {
        $client = Client::find($id);
      //  $bon_commande = BonCommande::where('client_id', $client->id)->first();
        
            return view('commerciale.clients.commande.create', compact('client'));  
    }

    public function store(Request $request)
    {
        $bon_commandes = BonCommande::all();
        $numero = count($bon_commandes)+1;
        $ref= 'B'.$this->getFirstLetter(Auth::user()->name).''.$this->getFirstLetter(Auth::user()->nom).str_replace('-', '', $request->created_at).''.$numero;
        
         BonCommande::firstOrCreate(
            ['client_id' => $request->client_id],
            [
                'ref' => $ref,
                'numero' => $numero,
                'user_id' => Auth::user()->id,
                'slug' => rand(19283,24356782398),
                'created_at' => $request->created_at,
                'updated_at' => $request->created_at,
            ]
        ); 
        return redirect()->route('commerciale.clients');

    }

    public function topdf($id, Request $request)
    {
        $client = Client::find($id);
        $bon_commande = BonCommande::where('client_id', $client->id)->first();
        if(empty($bon_commande)){
            return redirect()->route('commerciale.clients')->with('boncommandenotfound' ,'Le bon de commande n\'existe pas. Veillez le créer.');

        }
        $filename = Auth::user()->name.'_BC-'.''.$client->prenom.'-'.$client->nom.'.pdf';  
              $pdf = PDF::loadView('commerciale.clients.commande.topdf',compact('client', 'bon_commande'))
                         ->save($filename, 'commandes');
           return $pdf->download('Bon_de_commande'.$client->prenom.'-'.$client->nom.'.pdf');   
         
    }
}
