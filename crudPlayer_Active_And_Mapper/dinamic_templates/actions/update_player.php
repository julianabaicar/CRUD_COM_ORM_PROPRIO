<?php


    use logic\Database;
    use data_mapper\Player;
    use logic\active_record\playerActiveRecords;

    include '../logic/Database.php';
    include '../data_mapper/Player.php';
    include '../logic\active_record\playerActiveRecords.php';

    $db = logic\Database::getInstance('../players.db');

    $playerId   = $_POST['id'];
    $name       = $_POST['name'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    $existingPlayer = new Player($name, $username, $email, $password);
    $existingPlayer->setId($playerId); 
    $existingPlayerMapper->update($playerUpdate); //mesma situação do delete e do connect no idex.php, 
                                //não consegui identificar o problema

    header('Location: /index.php');
    exit();
