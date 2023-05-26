<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Commerciale\ClientController;
use App\Http\Controllers\Commerciale\CommandeController;
use App\Http\Controllers\Commerciale\CommercialeController;
use App\Http\Controllers\Commerciale\FactureController;

Route::get('/', [CommercialeController::class, 'index'])->name('commerciale');
Route::get('clients', [ClientController::class, 'index'])->name('commerciale.clients');

Route::post('commerciale/client/store', [ClientController::class, 'store'])->name('commerciale.client.store');
Route::get('commerciale/client/edit/{id}', [ClientController::class, 'edit'])->name('commerciale.client.edit');
Route::put('commerciale/client/update/{id}', [ClientController::class, 'update'])->name('commerciale.client.update');
Route::delete('commerciale/client/delete/{id}', [ClientController::class, 'delete'])->name('commerciale.client.delete');

Route::get('commerciale/client/commande/create/{id}', [CommandeController::class, 'create'])->name('commerciale.client.commande.create'); 
Route::post('commerciale/client/commande/store/{client}', [CommandeController::class, 'store'])->name('commerciale.client.commande.store'); 
Route::get('commerciale/client/commande/topdf/{id}', [CommandeController::class, 'topdf'])->name('commerciale.client.commande.topdf');


Route::get('commerciale/client/facture/create/{id}', [FactureController::class, 'create'])->name('commerciale.client.facture.create');
Route::get('commerciale/client/facture/topdf/{id}', [FactureController::class, 'topdf'])->name('commerciale.client.facture.topdf');