@extends('master.admin')

@section('content')
    
        <span>Liste des clients.</span>


    <div class="p-4 sm:ml-64">
        <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-gray-200 dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" wire:model.debounce.500ms="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            
                           
                         {{--    <button id="defaultModalButton" data-modal-toggle="defaultModalImage" class="flex items-center justify-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Ajouter des images 
                            </button> 
                            <button id="defaultModalButton" data-modal-toggle="defaultModalContenu" class="flex items-center justify-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Ajouter du contenu
                            </button>  --}}
                            
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Numéro</th>
                                    <th scope="col" class="px-4 py-3">Prenom</th>
                                    <th scope="col" class="px-4 py-3">Nom</th>
                                    <th scope="col" class="px-4 py-3">Entreprise</th>
                                    <th scope="col" class="px-4 py-3">Abonnement</th>
                                    <th scope="col" class="px-4 py-3">Nombre de mois</th>


                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($clients as $key=>$client)
                               <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $key + 1 }}</td>
                                    <td class="px-4 py-3">{{ $client->prenom }} </td>
                                    
                                    
                                    <td class="px-4 py-3">
                                        {{ $client->nom }}
                                    </td>

                                    <td class="px-6 py-4 text-red-800">
                                        {{ $client->entreprise }}
                                       </td>
                                     <td class="px-4 py-3"> {{ $client->abonnement->type }}</td>
                                    <td class="px-4 py-3">{{ $client->abonnement->nombres_mois }}</td>      
                               </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
            </section>
    </div>

   
@endsection