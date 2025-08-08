
/* Fonctionnalité : toogle lightmode */

const toggle = document.getElementById('toggle_lightmode');
toggle.addEventListener('click', () => {
  document.body.classList.toggle('dark');
});

/* FONCTIONS DE CALCUL DES DONNEES */

function calculateAndDisplayImpressions(datasRange) {
    // calcule le total des impressions - argument = la plage de données sur laquelle calculer
    let totalImpression = 0;
    for(let index = 0; index < datasRange.length; index++) {
        const impressionsNbr = parseInt(datasRange[index]["impressions"]);
        totalImpression += impressionsNbr;
    }
    
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
    
    let averageSessionsPerUserBloc = document.getElementById('average_sessions_nbr');
    averageSessionsPerUserBloc.innerHTML = averageSessionsPerUser;
}

calculateAndDisplayAverageSessionsPerUser(allDatas);

/* FONCTION D'AFFICHAGE DU GRAPH */

    // CAS 1 : 7 derniers jours

function display7LastDaysChart() {
    // suppr le canvas 6 months
    const sixMonthsCanvas = document.getElementById('last6MonthsChart');
    if (sixMonthsCanvas) sixMonthsCanvas.remove();

    // créé le canvas pour les 7 jours
    const container = document.getElementById('chartContainer');
    const canvas = document.createElement('canvas');
    canvas.id = 'last7DaysChart';
    container.appendChild(canvas);

    function formatYMDLocal(date) {
        // Formate une Date en "YYYY-MM-DD" en heure locale (évite toISOString UTC)
        const y = date.getFullYear();
        const m = String(date.getMonth() + 1).padStart(2, '0');
        const d = String(date.getDate()).padStart(2, '0');
        return `${y}-${m}-${d}`;
    }
    
    function parseDateRecordedToISO(s) {
        // Gère "DD/MM/YYYY" ou "YYYY-MM-DD" ou "YYYY-MM-DDTHH:..." et renvoie "YYYY-MM-DD"
        if (!s) return null;
        if (s.includes('/')) { // DD/MM/YYYY
        const [dd, mm, yyyy] = s.split('/');
        return `${yyyy}-${mm.padStart(2,'0')}-${dd.padStart(2,'0')}`;
        }
        // si c'est "YYYY-MM-DD..." on prend les 10 premiers caractères
        return s.slice(0, 10);
    }
    
    // ---------- Génération des N derniers jours (local) ----------
    function getLastNDays(n, endDate = new Date()) {
        const days = [];
        // base = minuit local du endDate (évite off-by-one lié à heure)
        const base = new Date(endDate.getFullYear(), endDate.getMonth(), endDate.getDate());
        for (let i = n - 1; i >= 0; i--) {
        const d = new Date(base);
        d.setDate(base.getDate() - i);
        days.push(formatYMDLocal(d));
        }
        return days;
    }
    
    // ---------- Construire la map à partir de allDatas (somme si doublons) ----------
    function buildDataMapFromAllDatas(allDatas) {
        const map = Object.create(null); // "objet propre" sans prototype
        allDatas.forEach(item => {
        const iso = parseDateRecordedToISO(item.date_recorded); // UTILISER date_recorded
        if (!iso) return;
        if (!map[iso]) map[iso] = { date: iso, impressions: 0, unique_visitors: 0 };
        map[iso].impressions += Number(item.impressions) || 0;
        map[iso].unique_visitors += Number(item.unique_visitors) || 0;
        });
        return map;
    }
    
    // ---------- Construire le tableau complet des N derniers jours ----------
    function buildCompleteLastNDays(allDatas, n = 7, endDate = new Date()) {
        const lastDays = getLastNDays(n, endDate);
        const dataMap = buildDataMapFromAllDatas(allDatas);
        return lastDays.map(date => dataMap[date] || { date, impressions: 0, unique_visitors: 0 });
    }

    let currentDate = new Date;
    let last7DaysDatas = buildCompleteLastNDays(allDatas, 7, currentDate);


    // récup les données et les mappe
    const dates = last7DaysDatas.map(item => item["date"]);
    const impressions = last7DaysDatas.map(item => parseInt(item["impressions"]));
    const visitors = last7DaysDatas.map(item => parseInt(item["unique_visitors"]));

    // get le canvas HTML à afficher
    const ctx = canvas.getContext('2d');

    // créé l'objet graphique
    new Chart(ctx, {
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
                label: 'Visiteurs uniques par jour',
                data: visitors,
                backgroundColor: '#1DA3AF',
                borderColor: '#1DA3AF',
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
}


    // CAS 2 : 6 derniers mois

function buildLast6MonthsData(allDatas, currentDate = new Date()) {
    // 1. Générer la liste des 6 derniers mois (format YYYY-MM)
    const months = [];
    for (let i = 5; i >= 0; i--) {
        const d = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1); // récup le mois
        const key = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}`;
        months.push(key);
    }

    // 2. Regrouper les données existantes par mois
    const monthMap = {};
    allDatas.forEach(item => {
        const d = new Date(item.date_recorded);
        const key = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}`;
        if (!monthMap[key]) {
            monthMap[key] = { impressions: 0, unique_visitors: 0 };
        }
        monthMap[key].impressions += item.impressions;
        monthMap[key].unique_visitors += item.unique_visitors;
    });

    // 3. Compléter les mois manquants
    const completeData = months.map(key => {
        if (monthMap[key]) {
            return { month: key, ...monthMap[key] };
        } else {
            return { month: key, impressions: 0, unique_visitors: 0 };
        }
    });

    return completeData;
}

// 4. Fonction pour afficher le graphique Chart.js
function renderLast6MonthsChart(allDatas) {
     // 1. Supprimer le canvas 7 jours s'il existe
     const fifteenDaysCanvas = document.getElementById('last7DaysChart');
     if (fifteenDaysCanvas) fifteenDaysCanvas.remove();
 
     // 2. Créer le canvas pour les 6 mois
     const container = document.getElementById('chartContainer');
     const canvas = document.createElement('canvas');
     canvas.id = 'last6MonthsChart';
     container.appendChild(canvas);

    const completeData = buildLast6MonthsData(allDatas);

    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: completeData.map(d => d.month),
            datasets: [
                {
                    label: 'Impressions sur le mois',
                    data: completeData.map(d => d.impressions),
                    backgroundColor: '#004643',
                    borderColor: '#004643',
                    borderWidth: 1,
                    yAxisID: 'y'
                },
                {
                    label: 'Visiteurs uniques sur le mois',
                    data: completeData.map(d => d.unique_visitors),
                    backgroundColor: '#1DA3AF',
                    borderColor: '#1DA3AF',
                    borderWidth: 1,
                    yAxisID: 'y'
                }
            ]
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
                        stepSize: 5 // utile si les valeurs sont faibles
                    }
                }
            }
        }
    });
}


// Events qui déclenchent les affichages
let daysSelector = document.getElementById('days');
daysSelector.addEventListener('change', () => {
    display7LastDaysChart();
});

let monthsSelector = document.getElementById('months');
monthsSelector.addEventListener('change', () => {
    renderLast6MonthsChart(allDatas);;
});


display7LastDaysChart(); // initialisation par défaut pour afficher les 7 derniers jours
