<?php

/* Fichier qui contient le mécanisme de déclenchement des enregistrements de données analytics */

// session
session_start();

// debug system
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// dépendances
include_once(__DIR__ . "/analytics_functions.php");


// MECANISME

/* Récupère la date actuelle */
$currentDate = (new DateTime())->format('Y-m-d');
// créé un objet DateTime mais ne donne à currentDate que le format attendu en BDD


/* Check si déjà entrée en BDD pour la date courante */
$isCurrentDateRecorded = isCurrentDateRecorded($currentDate);

/* MàJ de la BDD */
if(!$isCurrentDateRecorded){
    // si date n'existe pas encore, ajoute une entrée
    addCurrentDateInDB($currentDate);
    // et indique en session qu'il est venu aujourd'hui
    $_SESSION['visited_today'] = true;
    $_SESSION['last_visit_date'] = $currentDate;

} else {
    // pars du principe que ce n'est pas un nouveau visiteur
    $newVisitor = false;

    if(!hasAlreadyVisitedToday($currentDate)) { // check s'il est bien déjà venu
        // si c'est bien un nouveau, config sa session et passe newVisitor à true
        $_SESSION['visited_today'] = true;
        $_SESSION['last_visit_date'] = $currentDate;
        $newVisitor = true;
    };

    // récup les données du jour
    $previousStats = getCurrentDateInfos($currentDate);

    // puis renvoie données mises à jour
    $impressions = $previousStats['impressions'] + 1;
    $uniqueVisitors = $previousStats['unique_visitors'];
    if($newVisitor) {
        echo 'New visitor';
        $uniqueVisitors++; // si new visiteur, incrémente nbr visiteurs
    };
    updateDB($currentDate, $impressions, $uniqueVisitors);
}


?>