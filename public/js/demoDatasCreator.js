
function createDemoDatas() {
    let allDatas = [];
    let today = new Date();

    for (let i = 0; i < 150; i++) {
        let date = new Date(today);
        date.setDate(today.getDate() - i); // recule de i jours

        // Génère impressions puis unique_visitors toujours <= impressions
        let impressions = Math.floor(Math.random() * 20) + 5; // entre 5 et 24
        let unique_visitors = Math.floor(Math.random() * (impressions + 1)); // 0 à impressions

        // Format DD/MM/YYYY
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let year = date.getFullYear();

        allDatas.push({
            impressions: impressions,
            unique_visitors: unique_visitors,
            date_recorded: `${day}/${month}/${year}`
        });
    }

    return allDatas.reverse(); // du plus ancien au plus récent
}

let allDatas = createDemoDatas();

// debug
console.log(allDatas);
