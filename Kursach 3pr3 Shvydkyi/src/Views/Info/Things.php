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
            <p> Brand things: ' . $v["brand"] . '</p>
            <div class="lotinfo">

                <p> Type buisness:' . $v["type"] . '
                <br> Color: ' . $v["color"] . '
                <br> Material: ' . $v["naterial"] . '
                <br> Size: ' . $v["size"] . '
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
