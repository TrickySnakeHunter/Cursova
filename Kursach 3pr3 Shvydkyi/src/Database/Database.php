<?php

class Database
{
    public $host = null;
    public $username = null;
    public $password = null;
    public $db_name = null;
    public $conn;
    public $conf = null;
 
    private $data = array();
    private $nameCels = array();
    public $query;

    public function __construct()
    {

        $this->conf = $this->Conf("D:\\32gig card\\Unik\\PHP LABS\\Kursach 3pr3 Shvydkyi\\res\\mysql\\dataBaseConfig.json");
        $this->conn =   mysqli_connect(
            $this->host = $this->conf->database->host,
            $this->username = $this->conf->database->user,
            $this->password = $this->conf->database->password,
            $this->db_name = $this->conf->database->dbname,
        );
    }
    private function Conf($path)
    {
        $jsonStr = file_get_contents($path);
        $config = json_decode($jsonStr);
        return $config;
    }

    public function connCheck()
    {
        if ($this->conn->connect_errno) {
            return ("Failed to connect to the database: " . $this->conn->connect_error);
        } else {
            return ("connected to database " . $this->conf->database->dbname . "\n");
        }
    }
    public function query($query){
        $this->query = $query;
    }
    public function getQueryData()
    {
        $result =mysqli_query($this->conn,$this->query);
        while ($row = mysqli_fetch_assoc($result))
        array_push($this->data,$row);

        return $this->data;
    }
    public function runQuery(){
        mysqli_query($this->conn,$this->query);
    }
    public function getNameCells(){
        $result =mysqli_query($this->conn,$this->query);
            
        while ($field = $result->fetch_field()){
        array_push($this->nameCels, $field->name);
        }
       return $this->nameCels;
    }


    public function close()
    {
        exit("done");
    }
}
