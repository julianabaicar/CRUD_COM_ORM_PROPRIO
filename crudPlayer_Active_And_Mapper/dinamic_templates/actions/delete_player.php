<?php

    use logic\Database;
    use data_mapper\Player;
    use logic\active_record\playerActiveRecords;

    include '../logic/Database.php';
    include '../data_mapper/Player.php';
    include '../logic\active_record\playerActiveRecords.php';

    $db = logic\Database::getInstance($adress);

    $playerId = $_GET['id'];
    $action   = $_GET['action'];

    if($action ==='delete') {
        $playerToDelete = new data_mapper\Player('delete', 'delete', 'delete@example.com', 'delete');
        $playerToDelete->setId($id);
        $playerMapper= new data_mapper\PlayerMapper($db);
        $playerMapper->delete($playerToDelete); //ESTÁ DANDO ERRO NOS COMANDOS DE BANCO "DELETE" "CONNECT" "UPDATE" AINDA NÃO CONSEGUI RESOLVER ELES...
    }else if($action === 'cancel') {}

    header('Location:\apresentacao\index.php');
    exit();
