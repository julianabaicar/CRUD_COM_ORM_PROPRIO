<?php
    use logic\Database;
    use data_mapper\Player;
    use logic\active_record\playerActiveRecords;
    use Exception;

    include '../logic/Database.php';
    include '../data_mapper/Player.php';
    include '../logic/active_record/playerActiveRecords.php';


    $db = logic\Database::getInstance($adress); \PDO
    $db->connect(); //ESTÁ DANDO ERRO NOS COMANDOS DE BANCO "DELETE" "CONNECT" "UPDATE" AINDA NÃO CONSEGUI RESOLVER ELES...
                    //acho que posso ter esquecido algo, poderia ser um parametro nesse mesmo trecho de código,
                    //mas não consegui identificar
    
    try {
            $dsn = ('sqlite: ' . $adress);
            $pdo = new PDO($dsn);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        }catch (PDOException $e) {
        echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    }
