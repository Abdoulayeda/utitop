<?php

namespace App\Http\Controllers\Commerciale;

use App\Models\Client;
use App\Models\Facture;
use App\Models\BonCommande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller
{
    
    public function create($id)
    {
        $client = Client::find($id);
        $bon_commande = BonCommande::where('client_id', $client->id)->first();
        $factures = Facture::all();
        if(empty($bon_commande->ref)){
            return redirect()->route('commerciale.clients')->with('facturenotfound', 'Impossible d\'enregistré la facture car le bon de commande n\'existe pas. Veillez créer le bon de commande d\'abord.');
        }

        $facture = Facture::where('client_id', $client->id)->first();
        if(isset($facture)){
            return redirect()->route('commerciale.clients')->with('factureexist', 'La facture existe déja. ');

        }

        $ref= 'F'.''.substr($bon_commande->ref, 1);

        Facture::firstOrCreate(
            [   'client_id' => $client->id],
            [
                'ref_facture' =>$ref,
                'numero' => count($factures)+1,
                'slug' => rand(19283,24356782398),
                'status' => "payer",
                'bon_commande_id' => $bon_commande->id,
                'created_at' => $bon_commande->created_at,
                'updated_at' => $bon_commande->updated_at,
            ]
        );

        return redirect()->route('commerciale.clients');
    }

    public function topdf($id)
    {
        $client = Client::find($id);
        $facture = Facture::where('client_id', $client->id)->first(); 
        $nombres_mois = $client->abonnement->nombres_mois;
        $date_end = date('Y-m-d',strtotime("+ $nombres_mois months" , strtotime($facture->created_at))) ;
        $namefile =  Auth::user()->name.'_Facture-'.$client->prenom.'-'.$client->nom.'.pdf';

        $pdf = PDF::loadView('commerciale.clients.facture.topdf',compact('client', 'facture', 'date_end'))
                 ->save($namefile, 'factures');
       
        return $pdf->download($namefile);
    }
}
