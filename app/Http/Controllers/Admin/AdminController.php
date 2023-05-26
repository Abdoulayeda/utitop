<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data_dates= Client::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS month"), DB::raw('count(*) as total'))
             ->groupBy('month')
             ->orderBy('month')
             ->get();

             $labels_dates = $data_dates->pluck('month')->map(function ($month) {
                return \Carbon\Carbon::createFromFormat('Y-m', $month)->format('F Y');
            })->toArray();
            // $data_dates->pluck('month')->toArray();
             $values_dates = $data_dates->pluck('total')->toArray();
             
             $data = Client::select('abonnements.type', DB::raw('count(*) as total'))
             ->join('abonnements', 'clients.abonnement_id', '=', 'abonnements.id')
             ->groupBy('abonnements.type')
             ->get();


             $clients = Client::all();
             $abonnement_a = Abonnement::where('type', 'annuel')->first();
             //Récuperer les clients qui ont un abonnement annuel du commerciale connecté.
             $clients_aa = [];
             if(!empty($abonnement_a)){
                 $clients_aa = Client::where('abonnement_id', $abonnement_a->id)->get();
             }

             $labels = $data->pluck('type')->toArray();
             $values = $data->pluck('total')->toArray();

        return view('admin.index', compact('clients','values_dates', 'labels_dates', 'labels', 'values', 'clients_aa'));
    }


    public function clients()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }
}
