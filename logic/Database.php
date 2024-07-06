<?php
    
    namespace logic;
    use Exception;

    class Database
    {
        public static $db;
       
        // implementação do padrão de projetos singleton
        private function __construct(){}
        
        public static function getInstance($adress): \PDO
        {
            try {
                if (!isset(self::$db)) {
                    self::$db = new \PDO('sqlite:'. $adress);
                    self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                }
                return self::$db;
            } catch (Exception $e) {
                echo 'Erro: ' . $e->getMessage();
                throw $e;
            }
        }

        public function closeInstance()
        {
            self::$db = null;
        }
    }