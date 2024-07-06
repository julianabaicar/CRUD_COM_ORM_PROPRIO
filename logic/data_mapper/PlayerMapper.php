<?php

namespace data_mapper;
use Exception;
use logic\Database;
use data_mapper\Player;
use PDO;
use PDOStatement;

class PlayerMapper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function insert(Player $player)
    {
        $stmt = $this->connection->prepare("INSERT INTO players (id, name, username, email, password, registration_date) 
                                            VALUES (:id, :name, :username, :email, :password, :registration_date)");
        $id = $player->getId();
        $name = $player->getName();
        $username = $player->getUsername();
        $email = $player->getEmail();
        $password = $player->getPassword();
        $registration_date = $player->getRegistrationDate();

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':registration_date', $registration_date, PDO::PARAM_STR);

        $stmt->execute();
    }
    public function update(Player $player)
    {
        $stmt = $this->connection->prepare("UPDATE players SET name = :name, username = :username, email = :email, password = :password 
                                            WHERE id = :id");
        $id = $player->getId();
        $name = $player->getName();
        $username = $player->getUsername();
        $email = $player->getEmail();
        $password = $player->getPassword();

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();
    }
    public function delete(Player $player)
    {
        $stmt = $this->connection->prepare("DELETE FROM players WHERE id = :id");
        $id = $player->getId();
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getById($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM players WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll()
    {
        $stmt = $this->connection->prepare('SELECT * FROM players');
        $stmt->execute();
    
        $players = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $player = new Player($row['name'], $row['username'], $row['email'],  $row['password']);
            $player->setId($row['id']);
            $players[] = $player;
        }
    
        return $players;
    }
}