<?php
require_once('database/database.php');
$db = new database();

/*CREATION TACHE*/
if (isset($_POST['action']) && ($_POST['action'] === 'createTask')) {
    if (!empty($_POST['titleTask'])) {
        $userId = htmlspecialchars($_POST['userId']);
        $titleTask = htmlspecialchars($_POST['titleTask']);
        $idTask = $db->insertTask($userId, $titleTask);
        echo json_encode($idTask);
    }
}

/*AFFICHAGE TACHE*/
if (isset($_POST['action']) && ($_POST['action'] === 'displayTask')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $dataTask = $db->selectTask($idTask);
    echo json_encode($dataTask);
}

/*AJOUTER DESCRIPTION*/
if (isset($_POST['action']) && ($_POST['action'] === 'addDescription')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $description = htmlspecialchars($_POST['description']);
    $dataTask = $db->addDescription($description, $idTask);
    echo json_encode($dataTask);
}

/*UPDATE TITRE*/
if (isset($_POST['action']) && ($_POST['action'] === 'updateTitle')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $newTitle = htmlspecialchars($_POST['newTitle']);
    $dataTask = $db->updateTitle($newTitle, $idTask);
    echo json_encode($dataTask);
}

/*MARQUER COMME TERMINEE*/
if (isset($_POST['action']) && ($_POST['action'] === 'finish')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $endTask = $db->endTask($idTask);
    echo json_encode($endTask);
}

/*MARQUER COMME TERMINEE*/
if (isset($_POST['action']) && ($_POST['action'] === 'archive')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $endTask = $db->archiveTask($idTask);
    echo json_encode($endTask);
}