<?php

/* Fichier contenant les composants pour faire fonctionner la page d'analytics */

    // ENVIRONNEMENT //

// session
session_start();

/* session_unset(); // vide $_SESSION proprement
session_destroy(); // ferme la session */

// debug system
/* ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); */

// Dépendances
include_once(__DIR__ . "/password.php");
include_once(__DIR__ . "/analytics_system_functions.php");
    // base_url = lien vers la HP basé sur le serveur utilisé 
define("BASE_URL", ($_SERVER["SERVER_PORT"] === "5000") ? "http://localhost:5000/" : "https://www.fneto-prod.fr/portfolio/");


    // ROUTES //

$notification_message = null;

/* Tentative de connexion à l'interface admin */
if(isset($_POST['password_proposition']) && !empty($_POST['password'])) {
    if($_POST['password'] != PASSWORD) {
        $notification_message = "Mot de passe incorrect";
    } else {
        $_SESSION['admin_access_granted'] = true;
        if($_SERVER["SERVER_PORT"] === "5000") {
            header("Location: " . "/analytics/");
        } else {
            header("Location: " . "/portfolio/analytics/");
        };
    }
}

/* Accès à l'interface démo */
if(isset($_GET['mode']) && $_GET['mode'] == "demo") {
    $notification_message = "demo";
}

/* Case access granted */
// get all datas
if(isset($_SESSION['admin_access_granted']) && $_SESSION['admin_access_granted'] == true) {
    $notification_message = "granted";
    $datas = getAllDatas();
};


?>