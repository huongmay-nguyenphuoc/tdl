<?php
require_once('database/database.php');
$db = new database();

/*CREATION TACHE*/
if (isset($_POST['action']) && ($_POST['action'] === 'createTask')) {
    $userId = htmlspecialchars($_POST['userId']);
    $titleTask = htmlspecialchars($_POST['titleTask']);
    $idTask = $db->insertTask($userId, $titleTask);
    echo json_encode($idTask);
}

/*AFFICHAGE TACHE*/
if (isset($_POST['action']) && ($_POST['action'] === 'displayTask')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $dataTask = $db->selectTask($idTask);
    echo json_encode($dataTask);
}

/*MARQUER COMME TERMINEE*/
if (isset($_POST['action']) && ($_POST['action'] === 'finish')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $endTask = $db->endTask($idTask);
    echo json_encode($endTask);
}