<?php

    namespace data_mapper;
    use logic\Database;
    use data_mapper\JogadorMapper;


    /*classe que contém as propriedades correspondentes aos
    campos da tabela de jogadores e métodos para manipular esses dados*/
    class Player
    {
        private $id;
        private $name;
        private $username;
        private $email;
        private $password;
        private $registration_date;

        public function __construct($name, $username, $email, $password)
        {
            $this->name = $name;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->registration_date = date('Y-m-d H:i:s');
        }

        // Getters
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getName()
        {
            return $this->name;
        }
        public function setName($name)
        {
            $this->name = $name;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getRegistrationDate()
        {
            return $this->registration_date;
        }

        public function setRegistrationDate($registration_date)
        {
            $this->registration_date = $registration_date;
        }
    }
