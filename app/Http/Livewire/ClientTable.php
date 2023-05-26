<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Formule;
use Livewire\Component;
use App\Models\Abonnement;
use Illuminate\Support\Facades\Auth;

class ClientTable extends Component
{

    public $search = '';
    public function render()
    {
        $clients = Client::where('user_id', Auth::user()->id)
                           ->where('prenom', 'LIKE', '%' . $this->search . '%') 
                           ->latest()->get();
        $formules = Formule::all();
        $abonnements = Abonnement::all();
        return view('livewire.client-table' , compact('clients', 'formules', 'abonnements'));
    }
}
