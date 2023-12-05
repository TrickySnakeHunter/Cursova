<?php
include($_SERVER['DOCUMENT_ROOT'] . "../src/Database/Database.php");

class UserModel
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
    public function createUser($id,$name,$lastN,$mail,$pass,$phone){
        $this->query="INSERT INTO `users`( `id`,`name`,`lastName` ,`gmail`, `pswd`,`phone` ) VALUES ('".$id."' , '".$name."' , '".$lastN."' , '".$mail."' , '".hash('sha256',$pass)."' , '".$phone."')";
        $this->mysql->query($this->query);

       $this->mysql->runQuery();
       setcookie("User",$name);
    }
    public function createBalance($id,$idUser){
        $this->query="INSERT INTO `balance`( `id`,`idUser`,`balanse`) VALUES ('".$id."' , '".$idUser."' , '0')";
        $this->mysql->query($this->query);

       $this->mysql->runQuery();
    }
    public function setData($sql){
        $this->query=$sql;
        $this->mysql->query($this->query);

       $this->mysql->runQuery();
    }
    public function checkUser($mail,$pass){
        $this->query="SELECT `id`,`name`, `gmail`, `pswd` FROM `users` WHERE `gmail` ='".$mail."' AND `pswd` = '".hash('sha256',$pass)."'";
        $this->mysql->query($this->query);

        $res=$this->mysql->getQueryData();
        foreach($res as $v)
        setcookie("User",$v['name']);
        setcookie("UserNum",$v['id']);
        return $res;

    }
    
    public function getAllData($table)
    {
        $this->query = "SELECT * FROM `" . $table . "`";
       $this->mysql->query($this->query);
         
        return $this->mysql->getQueryData();
    }
    public function getData($table, $dataSearch, $cellName)
    {
        $this->query = "SELECT * FROM `" . $table . "`  WHERE `".$cellName."`= '".$dataSearch."'";
        $this->mysql->query($this->query);
         
        return $this->mysql->getQueryData();
    }


    public function getName($dataSearch)
    {
        $this->query = "SELECT * FROM " . $dataSearch . "";

        $this->mysql->query($this->query);
        return $this->mysql->getNameCells();
    }
    public function generateId($tabel)
    {
        while(true){
        $randomNumber = mt_rand(1, 1000000);
        $this->query = "SELECT `id` FROM `".$tabel."` WHERE `id` = '$randomNumber'";
        $this->mysql->query($this->query);
        $result = $this->mysql->getQueryData();
            if($result){}
            else
            
            return $randomNumber;
            break;
        }
    }
    public function deleteRowid($tabel,$id){
        $this->query="DELETE FROM  `" . $tabel . "`  WHERE `id`= ".$id;
        $this->mysql->query($this->query);

       $this->mysql->runQuery();
    }
    public function deleteRow($tabel,$cell,$id){
        $this->query="DELETE FROM  `" . $tabel . "`  WHERE `".$cell."`= ".$id;
        $this->mysql->query($this->query);

       $this->mysql->runQuery();
    }
}
