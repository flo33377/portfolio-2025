<?php

/* Fichier qui contient les fonctions permettant l'enregistrement des données analytics */

    /* CONNEXION DB */
function connect(): PDO { // connexion à la BDD
    $dbpath = __DIR__ . "/../db/db_portfolio.db";
    try {
        $mysqlClient = new PDO("sqlite:{$dbpath}");
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    return $mysqlClient;
}

    /* CHECK DE DB + AJOUT DATE SI BESOIN */
function isCurrentDateRecorded(string $currentDate) : bool { //renvoie sur date du jour déjà en BDD
    $SQL = 'SELECT 1 FROM portfolio_analytics WHERE date_recorded = ? LIMIT 1';
    $Statement = connect()->prepare($SQL);
    $Statement->execute([$currentDate]);

    $dateRecorded = $Statement->fetch();

    return $dateRecorded !== false;
    // return true si dateRecorded est diff de false (contient quelque chose --> date en BDD)
    // sinon dateRecorded = false, donc n'est pas diff de false (!==) => renvoie false
}

function addCurrentDateInDB(string $currentDate) { //Ajoute la date courante en DB
    $currentDate = (new DateTime())->format('Y-m-d');
    $SQL = 'INSERT INTO portfolio_analytics (date_recorded, impressions, unique_visitors, desktop, tablet, mobile, chrome, firefox, safari, edge, other_browser)
    VALUES (:date_recorded, :impressions, :unique_visitors, :desktop, :tablet, :mobile, 
    :chrome, :firefox, :safari, :edge, :other_browser)';
    $Statement = connect()->prepare($SQL);
    $Statement->execute([
        'date_recorded' => $currentDate,
        'impressions' => 1,
        'unique_visitors' => 1,
        'desktop' => 0,
        'tablet' => 0,
        'mobile' => 0,
        'chrome' => 0,
        'firefox' => 0,
        'safari' => 0,
        'edge' => 0,
        'other_browser' => 0
    ]);
}

    /* GET INFOS DE LA DB */
function getCurrentDateInfos(string $currentDate) : array { // récup les infos de la date en cours
    $SQL = 'SELECT * FROM portfolio_analytics WHERE date_recorded = ?';
    $Statement = connect()->prepare($SQL);
    $Statement->execute([$currentDate]);

    $infos = $Statement->fetch();
    return $infos;
}

    /* MAJ DE LA DB */

function hasAlreadyVisitedToday(string $currentDate) : bool { // renvoie true si user déjà venu aujourd'hui
    return isset($_SESSION['visited_today'], $_SESSION['last_visit_date']) 
    && $_SESSION['visited_today'] === true && ($_SESSION['last_visit_date'] == $currentDate) === true;
    // si tout est ok true = true => renvoie true, sinon false != true => renvoie false
}


function updateDB(string $currentDate, int $impressions, int $uniqueVisitors) { // màj les stats du jour
    $SQL = 'UPDATE portfolio_analytics SET impressions = :impressions, unique_visitors = :unique_visitors 
    WHERE date_recorded = :date_recorded';
    $Statement = connect()->prepare($SQL);
    $Statement->execute([
        'impressions' => $impressions,
        'unique_visitors' => $uniqueVisitors,
        'date_recorded' => $currentDate
    ]);
}


?>