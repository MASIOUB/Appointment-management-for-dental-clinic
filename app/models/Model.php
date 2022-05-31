<?php

class Model
{
    
    protected PDO $connection;
    protected $tableName;
    // protected $joinTable;


/**
     * get times which possible to get.
     *
     * @param date $dt
     */
    public function getTimesR($dt , $id_time)
    {

          $query = "SELECT * FROM appointments where date = '$dt' and timeslot_id = $id_time";
          $query = $this->connection->prepare($query);
          if($query->execute() && $query->rowCount()>0):
                return $query->rowCount();
          else:
                return false;
          endif;

    }
/**
     * get time which possible to get.
     *
     * @param id $id_time
     */
    public function getTime($id_time)
    {

          $query = "SELECT time FROM timeslots where id like $id_time";
          $query = $this->connection->prepare($query);
          if($query->execute() && $query->rowCount()>0):
                return $query->fetch(PDO::FETCH_ASSOC);
          else:
                return false;
          endif;

    }




    // ---------------------------------------------------------

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=dentiste", "root", "");
    }

    public function fetchAll($filtre = "", $data = [])
    {

        $statment = $this->connection->prepare("SELECT * FROM $this->tableName  $filtre");
        $statment->execute($data);
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }

    public function join($columns = ["*"], $joiture = "" ,$data = [])
    {
        $statement = $this->connection->prepare("SELECT $columns FROM $this->tableName $joiture");
        $statement->execute($data);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $keys = array_keys($data);

        $columns = implode(",", $keys);
        $placeholders = implode(",", array_map(function ($key) {
            return ":$key";
        }, $keys));


        $statment = $this->connection->prepare("INSERT INTO $this->tableName  ($columns) VALUES ($placeholders)");
        return $statment->execute($data);
    }

    public function update($data, $id)
    {

        // ["villeDepart=:villeDepart", "villeArrive=:villeArrive"]

        $updatedColumns = array_map(function ($key) {
            return "$key=:$key";
        }, array_keys($data));

        // villeArrive=:villeArrive, villeDepart=:villeDepart
        $updatedColumns = implode(", ", $updatedColumns);

        $statement = $this->connection->prepare("UPDATE $this->tableName SET $updatedColumns WHERE id=:id");
        return $statement->execute([...$data, "id" => $id]);
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM $this->tableName WHERE id=:id ");
        return $statement->execute(["id"=> $id]);
    }

    public function fetchById($id)
    {
        return $this->fetchOne("WHERE id =:id", ["id" => $id]);
    }

    public function fetchByRef($ref)
    {
        return $this->fetchOne("WHERE ref =:ref", ["ref" => $ref]);
    }

    public function fetchOne($filtre = "", $data = [])
    {
        $statment = $this->connection->prepare("SELECT * FROM $this->tableName $filtre");
        $statment->execute($data);
        return $statment->fetch(PDO::FETCH_ASSOC);
    }

}