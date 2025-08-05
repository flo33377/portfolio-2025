<?php

/* Files regrouping every functions to display analytics datas */

    /* CONNEXION DB */
function connect(): PDO { // connexion à la BDD
    $dbpath = __DIR__ . "/../../db/db_portfolio.db";
    try {
        $mysqlClient = new PDO("sqlite:{$dbpath}");
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    return $mysqlClient;
}

function getAllDatas() : array { // get all analytics datas from DB
    $SQL = "SELECT * FROM portfolio_analytics";
    $statement = connect()->prepare($SQL);
    $statement->execute();

    $datas = $statement->fetchAll();
    return $datas;
}



?>