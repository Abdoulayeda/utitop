<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FormuleController;
use App\Http\Controllers\Admin\AbonnementController;
use App\Http\Controllers\Admin\CommerciauxController;
    
Route::get('/',[AdminController::class, 'index'])->name('admin');

//Route pour les formules
Route::get('formules/index', [FormuleController::class, 'index'])->name('formules.index');
Route::post('formule/store', [FormuleController::class, 'store'])->name('formule.store');
Route::delete('formule/delete/{id}', [FormuleController::class, 'delete'])->name('formule.delete');

//Route pour abonnements
Route::get('abonnements/index', [AbonnementController::class, 'index'])->name('abonnements.index');
Route::post('abonnement/store', [AbonnementController::class, 'store'])->name('abonnement.store');
Route::delete('abonnement/delete/{id}', [AbonnementController::class, 'delete'])->name('abonnement.delete');

//Route pour les commerciaux
Route::get('commerciaux/index', [CommerciauxController::class, 'index'])->name('commerciaux.index');

Route::get('clients', [AdminController::class, 'clients'])->name('clients.index');