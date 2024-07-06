<?php

    
    require_once 'logic\Database.php';
    use Exception;

    class PlayerActiveRecords
    {

        private $id;
        private $name;
        private $username;
        private $email;
        private $password;
        private $registration_date;


        public function __construct($id, $name, $username, $email, $password)
        {
            $this->id = $id;
            $this->name = $name;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->registration_date = date("Y-m-d H:i:s");
        }

        public function setId( $id)
        {
            $this->id= $id;
        }
        
        public function getId()
        {
            return $this->id;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
        
        public function getName()
        {
            return $this->name;
        }

        /*NO CASO DAS CLASSES ABAIXO, NOTEI QUE A CONEXÃO COM O BANCO SE REPETE DIVERSAS VEZES,
        LEMBRO QUE O PROFESSOR COMENTOU A RESPEITO DESSA SITUAÇÃO PREJUDICAR A PERFORMANCE.
        aCAEI PESQUISANDO UM POUCO SOBRE O ACTIVE RECORDS E VI A RESPEITO DE TRANSACTION,
        ONDE HA UMA CLASSE TRANSECTION "RESPONSÁVEL" POR ESTABELECER ESSA CONEXÃO. GOSTARIA
        DE SABER SE ISSO CABE NESSE CONTEXTO OU NÃO, SE PUDER COMENTAR MAIS A RESPEITO NAS
        PRÓXIMAS AULAS, FICAREI IMENSAMENTE GRATA */
        public function save()
        {
            try
            {
                $db = logic\Database::getInstance('players.db');
                $db->beginTransaction();
                $stmt= $db->prepare('INSERT INTO players(id, name, username, email, password, registration_date)
                            VALUES(:id, :name, :username, :email, :password, :registration_date)');

                $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindParam(':passwword', $this->password, PDO::PARAM_STR);
                $stmt->bindParam(':registration_date', $this->registration_date, \PDO::PARAM_STR);

                $stmt->execute();

            }catch(Exception $e){
                    echo "Error: " . $e->getMessage();
                }
            }

        public function update()
        {
            try
            {
                $db = logic\Database::getInstance('players.db');
                $db->beginTransaction();
                $stmt= $db->prepare('UPDATE players SET name= :name, username= :username, email= :email, password= :password
                                    WHERE id =:id');
                                
                $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindParam(':passwword', $this->password, PDO::PARAM_STR);

                $stmt->execute();

            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        }
            
        public function delete()
        {
            try
            {
                $db = logic\Database::getInstance('players.db');
                $db->beginTransaction();
                $stmt= $db->prepare('DELETE FROM players WHERE id =:id');
                $stmt->bindParam('id', $this->id, PDO::PARAM_INT);
                $stmt->execute();
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        }

        public function get_by_id($id)
        {
            try
            {
                $db = logic\Database::getInstance('players.db');
                $db->beginTransaction();
                $stmt= $db->prepare('SELECT * FROM players WHERE id =' . $id);
                $stmt->execute();

                $results=$stmt->fetchAll(\PDO::FETCH_ASSOC);

                return $results;
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }

        }

        public function get_all()
        {
            try
            {
                $db = logic\Database::getInstance('players.db');
                $db->beginTransaction();
                $stmt= $db->prepare("SELECT * FROM players");
                $stmt->execute();

                $results=$stmt->fetchAll(\PDO::FETCH_ASSOC);

                return $results;
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }

        }
    }