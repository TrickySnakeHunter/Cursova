<?php
include("../Info/info.php");

$currentTime = date("H:i");
if (isset($_COOKIE["Action"]))
$tabel=$_COOKIE["Action"];
if (isset($_COOKIE["ActionId"]))
$id=$_COOKIE["ActionId"];

$time="";
include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/Action/ActionModel.php");
$actionModel = new ActionModel();

$act=$actionModel->getData($tabel,$id,"id");

echo '<h2> Your lot num:' . $id . '</h2>';



foreach($act as $v)
echo '
<link rel="stylesheet" href="../src/Views/Info/info.php">
<div class="containerr">
<div class="lot">
    <div class="lott">
            <div class="image"><img src="' . $v["img"] . '"  alt="Lot Image"/></div>
            <p> Type property: ' . $v["type"] . '</p>
            <div class="lotinfo">

                <p> Adress:' . $v["adress"] . '
                <br> Floor: ' . $v["floor"] . '
                <br> Built: ' . $v["built"] . '
                <br> Area: ' . $v["area"] . '
                <br> Rooms: ' . $v["rooms"] . '
                <br> Repair: ' . $v["reapair"] . '
                <br> Communications: ' . $v["communications"] . '
                <br> Structure: ' . $v["structure"] . '
                </p><div class="bet">
                <h5> End to trading: ' . $time . '</h5>

            </div>

    </div>

    </div>
    <div class="biddescription">
                <p>' . $v["description"] . '</p>
            </div>
</div>
            
</div>'
// Виводимо час

?>
