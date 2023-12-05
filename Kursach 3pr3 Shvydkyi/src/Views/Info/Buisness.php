<?php
include("../Info/info.php");
$time = "";
$currentTime = date("H:i");
if (isset($_COOKIE["Action"]))
    $tabel = $_COOKIE["Action"];
if (isset($_COOKIE["ActionId"]))
    $id = $_COOKIE["ActionId"];
    include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");

    $actionModel = new UserModel();

    $act = $actionModel->getData($tabel, $id, "id");
    echo '<h2> Your lot num:' . $id . '</h2>';
foreach ($act as $v)
    echo '
<link rel="stylesheet" href="../src/Views/Info/info.php">
<div class="containerr">
<div class="lot">
    <div class="lott">
            <div class="image"><img src="' . $v["img"] . '"  alt="Lot Image" /></div>
            <p> Name buisness: ' . $v["name"] . '</p>
            <div class="lotinfo">

                <p> Type buisness:' . $v["type"] . '
                <br> Production: ' . $v["products"] . '
                <br> Services: ' . $v["services"] . '
                <br> Licenses: ' . $v["licenses"] . '
                <br> Certefications: ' . $v["certifications"] . '
                <br> Capital: ' . $v["capital"] . '
                <br> Debts: ' . $v["debts"] . '
                <br> Staff: ' . $v["staff"] . '
                <br> Assets: ' . $v["assets"] . '
                <br> Founded: ' . $v["founded"] . '
                </p><div class="bet">
                <h5> End to trading: ' . $time . '</h5>

            </div>

    </div>

    </div>
    <div class="biddescription">
                <p>' . $v["description"] . '</p>
            </div>
</div>
            
</div>';
    // Виводимо час
