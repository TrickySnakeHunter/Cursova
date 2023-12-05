<?php
include("../Info/info.php");

$currentTime = date("H:i");
if (isset($_COOKIE["Action"]))
$tabel=$_COOKIE["Action"];
if (isset($_COOKIE["ActionId"]))
$id=$_COOKIE["ActionId"];

$time="";
echo '<h2> Your lot num:' . $id . '</h2>';



foreach($act as $v)
echo '
<link rel="stylesheet" href="../src/Views/Info/info.php">
<div class="containerr">
<div class="lot">
    <div class="lott">
            <div class="image"><img src="' . $v["img"] . '"  alt="Lot Image"/></div>
            <p> Name securities: ' . $v["name"] . '</p>
            <div class="lotinfo">

                <p> Type:' . $v["type"] . '
                <br> Code securities: ' . $v["code"] . '
                <br> Issue: ' . $v["issue"] . '
                <br> Value: ' . $v["value"] . '
                <br> Certefications: ' . $v["certifications"] . '
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
