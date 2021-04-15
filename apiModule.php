<?php
require_once('database/database.php');
$db = new database();

/*INSCRIPTION*/
if (isset($_POST['form']) && $_POST['form'] === 'inscription') {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);
        $errors = [];
        $userExists = $db->userExists($email);

        /*VERIFIC*/
        if (!empty($userExists)) {
            $errors[] = 'Cet email est déjà lié à un compte.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Cet email n\'est pas valide';
        }
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
            $errors[] = 'Le mot de passe n\'est pas suffisamment sécurisé.';
        }
        if ($password != $password2) {
            $errors[] = 'Les mots de passe sont différents.';
        }

        /*INSERTION*/
        if (empty($errors)) {
            $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
            $insert = $db->insertUser($email, $hashedpassword);
            if ($insert) {
                $result = ['Wow, inscription réussie :)'];
            } else {
                $result = ['Oops, un problème est survenu :('];
            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode($errors, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    } else {
        $errors = ['Remplis tous les champs, il n\'y en a que trois...'];
        echo json_encode($errors, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}

/*CONNEXION*/
if (isset($_POST['form']) && $_POST['form'] === 'connexion') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $userExists = $db->userExists($email);

        if (!empty($userExists)) {
            if (password_verify($password, $userExists["password"]) || $password === $userExists["password"]) {
                session_start();
                $_SESSION['user'] = $userExists['email'];
                $_SESSION['id'] = $userExists['id'];
                echo json_encode('success');
            } else {
                echo json_encode("failPass");
            }
        } else {
            echo json_encode("fail");
        }
    } else {
        echo json_encode('failFields');
    }
}

/*DECONNEXION*/
if (isset($_POST['logout']) && ($_POST['logout'] === 'logout')) {
    if (!(isset($_SESSION))) {
        session_start();
    }
    session_destroy();
    echo json_encode("true");
}