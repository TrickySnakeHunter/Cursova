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

    public function setPrice($time,$price,$id){
        $this->query="UPDATE `history` SET `end_time`='".$time.", `winn_price`='".$price."' WHERE `id`='".$id."'";
        $this->mysql->query($this->query);
        $this->mysql->runQuery();
    }
    
    

}
