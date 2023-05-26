<?php

namespace App\Models;

use NumberToWords\NumberToWords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

protected $fillable = [
    'prenom',
    'nom', 'email', 'telephone', 'adresse', 'formule_id', 'abonnement_id', 'user_id', 'entreprise'
];

    public $tarif= '';
    public string $remise = '';
    private $nombres_mois =0;

    public  function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function abonnement(): BelongsTo
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function factures(): HasMany
    {
        return $this->hasMany(Facture::class);
    }

    public function formule():BelongsTo
    {
        return $this->belongsTo(Formule::class);
    }

    public function bonCommande():HasOne
    {
        return $this->hasOne(BonCommande::class);
    }

    public function getRemise($nombres_mois)
    {
        if ($nombres_mois == 12) {
            $remise = '30%';
        } else {
            $remise = '';
        }
        return $remise;
    }

    public $total =0;
    public function getTotalSansRemise($montant, $nombres_mois)
    {
        return number_format($montant * $nombres_mois, 0, '', ' ');
    }

    public function getTotalAvecRemise($montant, $nombres_mois)
    {
        if($nombres_mois == 12){
            $total = 12 * $montant - ((12 * $montant * 30 )/100);
        }
        else {
            $total =  $nombres_mois * $montant;
        }

        return $total;
 } 

    public function getToLetter($nombre)
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        return $numberTransformer->toWords($nombre);
        
        return NumberToWords::transformCurrency('fr', $nombre, '');
        
    }

}
