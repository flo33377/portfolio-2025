<!-- Analytics datas to get retrieved in JS ! -->
<script> 
  const notallDatas = <?php echo json_encode($datas); ?>; // a modif pour allDatas quand test terminé
</script>
<!-- librairy chart.js pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="inline_datas">
    <div class="data_bloc">
        <p class="data_label">Nombre d'affichage du site</p>
        <p id="impressions_nbr"></p>
    </div>

    <div class="data_bloc">
        <p class="data_label">Nombre de visiteurs uniques</p>
        <p id="visitors_nbr"></p>
    </div>

    <div class="data_bloc">
        <p class="data_label">Nombre moyen de visite par utilisateur</p>
        <p id="average_sessions_nbr"></p>
    </div>
</div>

<div class="chart">
    <canvas id="impressionsChart" width="600" height="300"></canvas>
</div>

