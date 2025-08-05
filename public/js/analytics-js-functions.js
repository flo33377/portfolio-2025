
let allDatas = []; // faux jeu de données pour test

for (let i = 1; i <= 15; i++) {
  let day = String(i).padStart(2, '0');
  allDatas.push({
    impressions: Math.floor(Math.random() * 20) + 1,
    unique_visitors: Math.floor(Math.random() * 10) + 1,
    date_recorded: `${day}/08/2025`
  });
};

/* Fonctionnalité : toogle lightmode */

const toggle = document.getElementById('toggle_lightmode');
toggle.addEventListener('click', () => {
  document.body.classList.toggle('dark');
});

// debug
console.log(allDatas);

/* FONCTIONS DE CALCUL DES DONNEES */

function calculateAndDisplayImpressions(datasRange) {
    // calcule le total des impressions - argument = la plage de données sur laquelle calculer
    let totalImpression = 0;
    for(let index = 0; index < datasRange.length; index++) {
        const impressionsNbr = parseInt(datasRange[index]["impressions"]);
        totalImpression += impressionsNbr;
    }
    console.log("Nbr impressions : " + totalImpression); // debug
    
    let impressionsNbrBloc = document.getElementById('impressions_nbr');
    impressionsNbrBloc.innerHTML = totalImpression;
}

calculateAndDisplayImpressions(allDatas);


function calculateAndDisplayUniqueVisitors(datasRange) {
    // calcule le total des visiteurs unique - argument = la plage de données sur laquelle calculer
    let totalVisitors = 0;
    for(let index = 0; index < datasRange.length; index++) {
        const visitorsNbr = parseInt(datasRange[index]["unique_visitors"]);
        totalVisitors += visitorsNbr;
    }
    console.log("Nbr visiteurs uniques : " + totalVisitors); // debug
    
    let userNbrBloc = document.getElementById('visitors_nbr');
    userNbrBloc.innerHTML = totalVisitors;
}

calculateAndDisplayUniqueVisitors(allDatas);


function calculateAndDisplayAverageSessionsPerUser(datasRange) {
    // calcule le nbr moyen de session par user - argument = la plage de données sur laquelle calculer
    let totalImpression = 0;
    for(let index = 0; index < datasRange.length; index++) {
        const impressionsNbr = parseInt(datasRange[index]["impressions"]);
        totalImpression += impressionsNbr;
    }

    let totalVisitors = 0;
    for(let index = 0; index < datasRange.length; index++) {
        const visitorsNbr = parseInt(datasRange[index]["unique_visitors"]);
        totalVisitors += visitorsNbr;
    }

    let averageSessionsPerUser = totalImpression / totalVisitors;
    averageSessionsPerUser = parseFloat(averageSessionsPerUser.toFixed(1)); // toFixed renvoie une string

    console.log("Nbr sessions par user : " + averageSessionsPerUser); // debug
    
    let averageSessionsPerUserBloc = document.getElementById('average_sessions_nbr');
    averageSessionsPerUserBloc.innerHTML = averageSessionsPerUser;
}

calculateAndDisplayAverageSessionsPerUser(allDatas);

/* FONCTION D'AFFICHAGE DU GRAPH */

// récup les données et les mappe
const dates = allDatas.map(item => item["date_recorded"]);
const impressions = allDatas.map(item => parseInt(item["impressions"]));
const visitors = allDatas.map(item => parseInt(item["unique_visitors"]));

// get le canvas HTML
const ctx = document.getElementById('impressionsChart').getContext('2d');

// créé l'objet graphique
const chart = new Chart(ctx, {
    type: 'line', // line ou bar
    data: {
        labels: dates,
        datasets: [{
            label: 'Impressions par jour',
            data: impressions,
            backgroundColor: '#004643',
            borderColor: '#004643',
            borderWidth: 1,
            yAxisID: 'y'
        },
        {
            label: 'Visiteurs uniques',
            data: visitors,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            yAxisID: 'y',
        }]
    },
    options: {
        responsive: true,
        interaction: {
            mode: 'index',
            intersect: false
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1 // utile si les valeurs sont faibles
                }
            }
        }
    }
});

  

