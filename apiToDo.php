<?php
require_once('database/database.php');
$db = new database();

if (isset($_POST['action']) && ($_POST['action'] === 'createTask')) {
    $userId = htmlspecialchars($_POST['userId']);
    $titleTask = htmlspecialchars($_POST['titleTask']);
    $idTask = $db->insertTask($userId, $titleTask);
    echo json_encode($idTask);
}

if (isset($_POST['action']) && ($_POST['action'] === 'displayTask')) {
    $idTask = htmlspecialchars($_POST['idTask']);
    $dataTask = $db->selectTask($idTask);
    echo json_encode($dataTask);
}