@extends('master.commerciale')

@section('content')
    <div class="sm:ml-64">
         <div class="pt-12 flex justify-center ">
            <form action="{{ route('commerciale.client.commande.store', $client) }}" method="post" class="w-1/2">
               @csrf
               <div>
                <input type="hidden" value="{{ $client->id }}" name="client_id">
               </div>
               <div class="pt-6 pb-6">
                <label for="" class="text-white text-2xl pb-6">Date du bon de commande</label> <br>
                <input type="date" name="created_at" class="w-full mt-4 py-3 rounded-lg">
               </div>
        
                <button class="bg-[#F38D4E] text-white text-2xl py-3 px-4 rounded-xl hover:outline-4 motion-safe:hover:scale-[1.1] transition-all">Enregistrer</button>
            </form>
        </div> 
    </div>
@endsection