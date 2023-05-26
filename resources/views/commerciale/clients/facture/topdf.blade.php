<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Facture</title>

</head>
<body>

   
  
    {{-- main--}}
    <div class="main"> 
       {{-- Entete du bon de commande --}}
        <div class="entete">
            {{-- Logo Adresse --}}
            <div class="entete-left">
                <img src="{{ public_path('images/logo.png') }}" alt="" width="120px">
                <p class="">VDN Cité Villa 04</p>
                <p class="">+221 33 868 54 14</p>
            </div>
            {{-- Infos clients --}}
            
            <div class="entete-right" ALIGN=RIGHT>
                <p>{{ $facture->ref_facture }}</p>
                <p>{{-- substr($facture->created_at,0,10) --}}2023-04-12</p> 
                <p>{{ $client->entreprise }}</p>
                <p>{{ $client->prenom }} {{ $client->nom }} </p>
                <p>{{ $client->adresse }}</p>
                <p>{{ $client->telephone }}</p>
            </div>
        </div>
       
        <div class="date">
            <p>Période du {{ substr($facture->created_at,0,10) }} au {{--2023-04-03 au 2023-05-03--}} {{ $date_end }}</p>
            {{-- <p>A payer avant le 04 avril 2023.</p>  --}}
        </div>

        {{-- Contenu du document --}}
        <div class="commande">
            {{-- Titre --}}
            <p >FACTURE</p> 
            
        </div>
        {{-- Tableau --}}
         <table class="tableau">
            <thead>
                <th>Désignation</th>
                <th>Référence</th>
                <th>Quantité</th>
                <th>Prix unitaire HT</th>
                <th>Remise</th>
                <th colspan="2">Montant</th>
            </thead>
           
            <tbody>
                {{-- 1 ere ligne --}}    
                <tr>
                    <td>F-{{ $client->formule->type_formule }}</td>
                    <td>abonnement  {{ $client->abonnement->type }}</td>
                    <td>{{-- 1 --}}{{ $client->abonnement->nombres_mois }}</td> 
                    <td> {{ number_format($client->formule->tarif, 0, '', ' ') }} FCFA</td>   
                    <td></td>
                    
                    <td></td>
                    <td>{{ $client->getTotalSansRemise($client->formule->tarif, $client->abonnement->nombres_mois) }} FCFA</td>    
                </tr>
                {{-- 2 iéme ligne --}}
                <tr>
                    <td><br></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{-- $client->getRemise($client->abonnement->type) --}}</td>
                    <td></td>
                    <td></td>
                </tr>

                 {{-- 3 iéme ligne --}}
                 <tr>
                    <td><br></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TVA</td>
                    <td></td>
                </tr>
                 
                 {{-- 4 ième ligne --}}
                <tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total HT</td>
                    <td>{{ $client->getTotalSansRemise($client->formule->tarif, $client->abonnement->nombres_mois ) }} CFA </td>
                </tr>
                {{-- 5 ième ligne --}}
                <tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total <br> TTC</td>

                    <td>
                        {{ $client->getTotalSansRemise($client->formule->tarif, $client->abonnement->nombres_mois ) }} CFA 
                    </td>
                </tr>
                {{-- 6 ième ligne --}}
                <tr>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $client->getRemise($client->abonnement->nombres_mois) }}</td>
                    <td>Net à payer</td>
                    <td>
                        {{ number_format($client->getTotalAvecRemise($client->formule->tarif,$client->abonnement->nombres_mois), 0, '', ' ') }} CFA 
                    </td>
                </tr>
            </tbody>
         </table>
       
        {{-- Contenu du footer --}}
        <div class="footer-content">
                <p><span class="color-taktyl">Taktyl</span> est une marque commerciale de ALYMIA SAS</p>
               <p>au Capital de 1.000.000 FCFA NINEA 008540892 RCCM SN- DKR- 2021 B 14645</p>
        </div>

        {{-- Signature --}}
        <div class="texte">
               <p>Arrêté la présente facture à la somme de  {{$client->getToLetter(intval($client->getTotalAvecRemise($client->formule->tarif,$client->abonnement->nombres_mois),10))}} CFA</p> 
               {{-- $client->getToLetter(189000) --}}
        </div>
        
        

    </div>

    <style>
        .main{
            padding: 10px;
        }
        .commande{
            width: 100%;
            justify-content: center;
            align-content: center;
            background-color: rgb(78, 78, 228);
            margin-top: 80px;
        }

      .commande p{
           text-align: center;
           padding: 10px 0  10px 0;
           font-size: 30px;
           color: white;
           font-family: bold;
           margin-bottom: 0; 
     }

     .tableau{
          width: 100%;
     }

     .tableau-thead{
          border-bottom: solid 2px #F38D4E;   
     }

     table {
         border-collapse: collapse;
     }

     table thead th{
         border-left: solid 2px #F38D4E;
         border-right: solid 2px #F38D4E;
         padding: 15px;
     }

     table tbody tr td{
        border: solid 2px #F38D4E;
        text-align: center;
        padding: 10px;
        font-size: 18px;
     }

     .footer-content p{
        text-align: center;
        color: rgb(72, 72, 179);
        font-size: 15px;
     }

    

     .entete-right{
          position: absolute;
          right: 10;
          top: 10px;
     }
     .entete-right p{
          color: rgb(72, 72, 179);   
     }

     .entete-left p{
          color: rgb(72, 72, 179);
     }

     .color-taktyl{
          color:  #F38D4E;
     }

     .texte{
          color: rgb(72, 72, 179);
          font-size: 16px;
     }

     .date{
          margin-left: 60px;
          margin-top: 10px;
          color: rgb(72, 72, 179);
          font-size: 18px;
     }

     

    </style>
</body>
</html>