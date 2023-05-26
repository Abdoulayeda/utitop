<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function bon_commande(): BelongsTo
    {
        return $this->belongsTo(BonCommande::class);
    }

    //Fonction pour ajouter des mois 
    public function getAddMonths($nombre, $date)
    {
        return '';
    }

    protected $fillable = [
        'ref_facture',
        'numero',
        'slug',
        'status',
        'client_id',
        'bon_commande_id',
        'created_at',
        'updated_at'
    ];

}
