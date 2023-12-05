<?php
include($_SERVER['DOCUMENT_ROOT'] . "../src/Database/Database.php");

class ActionModel
{

    private $mysql;
    private $query;
    private $path;
    private $data = array();
    private $name = array();

    private $jsData;


    public function __construct()
    {
        $this->mysql = new Database();
        $this->path = $_SERVER['DOCUMENT_ROOT'] . "../src/Views/Action/action.json";
    }


    public function saveCooke($name, $value)
    {
        setcookie($name, $value);
    }
    public function getAllData($table)
    {
        $this->query = "SELECT * FROM `" . $table . "`";
        $this->mysql->query($this->query);

        return $this->mysql->getQueryData();
    }
    public function getData($table, $dataSearch, $cellName)
    {
        $this->query = "SELECT * FROM `" . $table . "`  WHERE `" . $cellName . "` = '" . $dataSearch . "'";
        $this->mysql->query($this->query);

        return $this->mysql->getQueryData();
    }


    public function getName($dataSearch)
    {
        $this->query = "DESC `" . $dataSearch . "`";

        $this->mysql->query($this->query);
        array_push($this->name, $this->mysql->getQueryData());
        return $this->name;
    }
    public function generateJson($query)
    {
        $this->jsData = ["hello"]; //["1" => "daddwad"]
        $fp = fopen($this->path, "w");
        fwrite($fp, json_encode($this->jsData, JSON_PRETTY_PRINT));
        fclose($fp);
    }
    public function updateInfo($Query)
    {
        $this->query = $Query;
        $this->mysql->query($this->query);

        $this->mysql->runQuery();
    }
}
