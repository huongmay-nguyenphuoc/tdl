<?php


class database
{
    private $pdo;

    public function __construct()
    {
        try {
            $pdo = new PDO('mysql:host=localhost; dbname=tdl; charset=utf8', 'root', '');
            $this->pdo = $pdo;

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function userExists($email)
    {
        $request = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $request->execute([$email]);
        $userExists = $request->fetch(PDO::FETCH_ASSOC);
        return $userExists;
    }

    public function insertUser($email, $password)
    {
        $request = $this->pdo->prepare("INSERT INTO user (`email`, `password`) VALUES (:email, :password)");
        $insert = $request->execute(array(
            ':email' => $email,
            ':password' => $password));
        return $insert;
    }

    public function insertTask($idUser, $titleTask)
    {
        $request = $this->pdo->prepare("INSERT INTO task (`id_user`, `title`) VALUES (:idUser, :title)");
        $insert = $request->execute(array(
            ':idUser' => $idUser,
            ':title' => $titleTask));
        $idTask = $this->pdo->lastInsertId();
        return $idTask;
    }

    public function selectTask($idTask)
    {
        $request = $this->pdo->prepare("SELECT * FROM task WHERE id = ?");
        $request->execute([$idTask]);
        $taskData = $request->fetch(PDO::FETCH_ASSOC);
        return $taskData;
    }


    public function selectTasks($idUser)
    {
        $request = $this->pdo->prepare("SELECT * FROM task WHERE id_user = ? AND status = 'todo' ");
        $request->execute([$idUser]);
        $tasksUserToDo = $request->fetchAll(PDO::FETCH_ASSOC);

        $request2 = $this->pdo->prepare("SELECT * FROM task WHERE id_user = ? AND status = 'done' ");
        $request2->execute([$idUser]);
        $tasksUserDone = $request2->fetchAll(PDO::FETCH_ASSOC);
        $tasksUser = array('toDo' => $tasksUserToDo, 'done' => $tasksUserDone);
        return $tasksUser;
    }

    public function endTask($idTask)
    {
        $request = $this->pdo->prepare("UPDATE task SET status = 'done', END = NOW() WHERE id = ?");
        $request->execute([$idTask]);
        return date('d-m-Y');
    }
}
