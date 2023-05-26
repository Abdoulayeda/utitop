<?php

namespace App\Http\Controllers\Commerciale;

use App\Models\User;
use App\Models\Client;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommercialeController extends Controller
{
    public function index()
    {

        $data_dates= Client::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS month"), DB::raw('count(*) as total'))
             ->groupBy('month')
             ->orderBy('month')
             ->where('user_id', Auth::user()->id)
             ->get();

             $labels_dates = $data_dates->pluck('month')->map(function ($month) {
                return \Carbon\Carbon::createFromFormat('Y-m', $month)->format('F Y');
            })->toArray();
            // $data_dates->pluck('month')->toArray();
             $values_dates = $data_dates->pluck('total')->toArray();
             
        $data = Client::select('abonnements.type', DB::raw('count(*) as total'))
             ->join('abonnements', 'clients.abonnement_id', '=', 'abonnements.id')
             ->groupBy('abonnements.type')
             ->where('user_id', Auth::user()->id)
             ->get();

             $labels = $data->pluck('type')->toArray();
             $values = $data->pluck('total')->toArray();



        $user = User::where('id',Auth::user()->id)->first();
        //  return Auth::user()->id;
          //Récupérer l'abonnement annuel
          $abonnement_a = Abonnement::where('type', 'annuel')->first();
          //Récuperer les clients qui ont un abonnement annuel du commerciale connecté.
          $clients_aa = [];
          if(!empty($abonnement_a)){
              $clients_aa = Client::where('user_id', Auth::user()->id)->where('abonnement_id', $abonnement_a->id)->get();
          }
        return view('commerciale.index',  compact('user', 'labels_dates', 'values_dates' ,'clients_aa', 'labels', 'values'));
    }
}
