<?php
$time = "";
$currentTime = date("H:i");
if (isset($_COOKIE["Action"]))
    $tabel = $_COOKIE["Action"];
    if (isset($_COOKIE["ActionId"]))
    $id = $_COOKIE["ActionId"];
include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");

$actionModel = new UserModel();
$actionModel2 = new UserModel();
$actionModel3 = new UserModel();
$act = $actionModel->getData($tabel, $id, "id");
foreach ($act as $v){

if (isset($_COOKIE["UserNum"])) {
    $balanse =  $actionModel2->getData("balance", $_COOKIE['UserNum'], 'idUser');
    $money = 0;
   
    foreach ($balanse as $n) {
    
        $money = $n['balanse'];
    }
    echo $money;
    if (isset($_POST["YourBid"])) {

        $act= $actionModel3->getData("trading", $v["id"], "id_lot");



        foreach ($act as $v2) {
           
            if ( $v2["end_time"] > $currentTime&& intval($money) < intval($_POST["YourBid"] )) {
                $actionModel3->setData("UPDATE `trading` SET `winner`='" . $_COOKIE["UserNum"] . "', `winn_price`='" . $_POST["YourBid"] . "' where `id_lot`='" . $id . "'");
            
            } else {
                $time = "Time is up";
                
                $temp = intval($money) - intval($_POST["YourBid"] );
                $actionModel2->setData("UPDATE `balance` SET `balanse`='" . $temp . "' WHERE `idUser`='" . $_COOKIE["UserNum"]. "'");
            }
           
        }
    } 
}
else {
    echo '<h4>
'.$temp.'
You are not registration;
</h4>';
}
}
echo '<h2> Your lot num:' . $id . '</h2>';

header("Location:"."../Info/info.html");
