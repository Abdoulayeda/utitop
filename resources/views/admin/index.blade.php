@extends('master.admin')

@section('content')
    <div class="sm:ml-64  ">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mx-6 py-6">
            <div class="shadow-lg hover:shadow-2xl bg-white rounded-lg flex p-4 flex-col justify-center items-center">
                <span class="text-4xl font-bold text-orange-500">{{ count($clients) }}</span>
                <span class="text-3xl font-bold">Clients</span>
            </div>
            <div class="shadow-lg hover:shadow-2xl bg-white rounded-lg flex p-4 flex-col justify-center items-center">
                <span class="text-4xl font-bold text-orange-500">{{ count($clients_aa) }}</span>
                <span class="text-3xl font-bold">Abonnement</span>
                <span class="text-3xl font-bold">annuel</span>
            </div>
            <div class="shadow-lg hover:shadow-2xl bg-white rounded-lg flex p-4 flex-col justify-center items-center">
                <span class="text-4xl font-bold text-orange-500">{{ count($clients) - count($clients_aa) }}</span>
                <span class="text-3xl font-bold">Abonnement</span>
                <span class="text-3xl font-bold">mensuel</span>
            </div>
            
              
           
        </div>
       
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-3"> 
             <div class="w-64 h-64">
              <canvas class="grid grid-cols-2 gap-4  place-content-center" id="myChart"></canvas>
          </div> 
    
          <div class="w-64 h-64">
            <canvas id="myChart_dates"></canvas>
          </div>
           </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          // Récupérer les données formatées depuis le contrôleur
          var labels_dates = {!! json_encode($labels_dates) !!};
          var data_dates = {!! json_encode($values_dates) !!};
        
          // Créer le graphique en bâtons avec Chart.js
          var ctx = document.getElementById('myChart_dates').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels_dates,
              datasets: [{
                label: 'Nombre de clients par mois',
                data: data_dates,
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Couleur de remplissage des bâtons
                borderColor: 'rgba(54, 162, 235, 1)', // Couleur des bordures des bâtons
                borderWidth: 1 // Largeur des bordures des bâtons
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true, // Commencez l'axe y à zéro
                  stepSize: 1 // Incrément des valeurs de l'axe y (nombre entier)
                }
              }
            }
          });
        </script>


<script>
    // Récupérer les données formatées depuis le contrôleur
    var data = {!! json_encode($values) !!};
    var labels = {!! json_encode($labels) !!};
  
    // Créer le graphique circulaire avec Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          data: data,
          backgroundColor: [
            'rgba(61, 35, 225, 0.8)', // Couleur pour le premier type d'abonnement
            'rgba(54, 162, 235, 0.5)', // Couleur pour le deuxième type d'abonnement
            // Ajoutez d'autres couleurs si nécessaire
          ],
        }],
      },
      options: {
      plugins: {
        legend: {
          labels: {
            color: 'rgba(245, 245, 248, 0.8)', // Couleur du texte
          },
        },
      },
      
    },
    options: {
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              var label = context.label || '';
              if (label) {
                label += ': ';
              }
              label += context.formattedValue; // Utilisez uniquement la valeur formatée pour afficher le nombre
  
              var dataset = context.dataset;
              var total = dataset.data.reduce(function(previousValue, currentValue) {
                return previousValue + currentValue;
              });
              var currentValue = dataset.data[context.dataIndex];
              var percentage = ((currentValue / total) * 100).toFixed(2); // Calculez le pourcentage
  
              label += ' (' + percentage + '%)'; // Ajoutez le pourcentage à la valeur affichée
  
              return label;
            }
          }
        },
        // Autres options et plugins si nécessaire
      }
    }
  
    });
  </script>
  
    </div>




@endsection