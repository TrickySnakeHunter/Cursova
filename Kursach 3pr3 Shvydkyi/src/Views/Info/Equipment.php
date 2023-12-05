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
            <p> Mark: ' . $v["mark"] . '</p>
            <div class="lotinfo">

                <p> Type equipment:' . $v["type"] . '
                <br> Create Day: ' . $v["createDay"] . '
                <br> Size: ' . $v["size"] . '
                <br> Description: ' . $v["description"] . '
                <br> Color: ' . $v["color"] . '
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
