
<!-- Analytics datas to get retrieved in JS -->
 <?php if(isset($_SESSION['admin_access_granted']) && $_SESSION['admin_access_granted'] === true) : 
    // case access admin ?>
<script> 
  const allDatas = <?php echo json_encode($datas); ?>; // vrai jeu de datas
</script>

<?php elseif(isset($notification_message) && $notification_message == "demo") : 
    // case access demo ?>
<script src="./../public/js/demoDatasCreator.js"></script>

<?php else : 
    // case access unrecognized ?>
    <p class="warning_message">Vous semblez tenter d'accéder à l'interface depuis un lien non-conforme.<br>
    Revenez sur l'espace démo en cliquant ci-dessous :</p>
    <div class="cta"><a href='<?= BASE_URL ?>analytics/?mode=demo'>Accéder à l'espace démo</a></div>
<?php endif ?>

<!-- librairy chart.js pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if($notification_message == "demo") : ?>
    <p class="warning_message">Pour des raisons de confidentialité, les données présentées en mode démo sont factices.</p>
<?php endif ?>

<div class="inline_datas">
    <div class="data_bloc">
        <p class="data_label">Nombre d'affichages du site</p>
        <p id="impressions_nbr"></p>
    </div>

    <div class="data_bloc">
        <p class="data_label">Nombre de visiteurs uniques</p>
        <p id="visitors_nbr"></p>
    </div>

    <div class="data_bloc">
        <p class="data_label">Nombre moyen de visite(s) par utilisateur</p>
        <p id="average_sessions_nbr"></p>
    </div>
</div>

<div class="chart">
<div id='periodSelection'>
        <input type='radio' id='days' name='periodRadio' value='days' checked>
        <label for='days'>7 derniers<br>jours</label>
        <input type='radio' id='months' name='periodRadio' value='months'>
        <label for='months'>6 derniers mois</label>
        <div class="slider"></div>
    </div>

    <div id='chartContainer'></div>
</div>

<div class="summary_info"><details>
    <summary>Comment sont comptabilisées mes données ?</summary>
    <ul>
        <li><span class="bold underline">Impression du site :</span> A chaque visite sur le site, un fichier PHP va regarder en base de données si la date du jour
            est déjà enregistrée. Si oui, il incrémente le nombre de visite et met à jour la base. Sinon, il créé une entrée
            pour cette date et y note une visite.
        </li>
        <li><span class="bold underline">Visiteur unique :</span> à chaque visite, le fichier PHP regarde si vous avez déjà effectué une visite via une donnée
            de session anonyme et datée.<br>Si vous avez déjà visité le site aujourd'hui, 
            le fichier n'augmente que le nombre de visites, et si ce n'est pas le cas, il augmente aussi le nombre de visiteur
            unique et vous créé une donnée de session avec la date du jour.
        </li>
    </ul>
</details></div>

