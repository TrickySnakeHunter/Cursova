<?php
include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");
$userModel = new UserModel();


if (isset($_POST["mail"])) {

    $mail = $_POST["mail"];
    $pass = $_POST["pass"];
    if (isset($_POST["pass2"]))
        $pass2 = $_POST["pass2"];
    if (isset($_POST["name"]))
        $name = $_POST["name"];
    if (isset($_POST["lastName"]))
        $lastN = $_POST["lastName"];
    if (isset($_POST["phone"]))
        $phone = $_POST["phone"];




    if (isset($_POST["name"])) {
        $out = $userModel->getData("users", $mail, "gmail");
        foreach ($out as $v) {

            $mailRepit = $v["gmail"];
        }
        if ($mailRepit != $mail) {
            if ($pass == $pass2) {
                $id = $userModel->generateId("users");
                setcookie("UserNum", $id);
                $userModel->createUser($id, $name, $lastN, $mail, $pass, $phone);

                $userModel->createBalance($userModel->generateId("balance"), $id);
                setcookie("Home", "Home");
                header('Location:index.php');

                exit;
            }
        } else {
            echo '<script language="javascript">alert("This acaunt has bean created");</script>';
        }
    } else {
        if ($userModel->checkUser($mail, $pass)) {
            setcookie("Home", "Home");
            header('Location:index.php');
            exit;
        } else {
            echo '<script language="javascript">alert("Wrong mail or password");</script>';
        }
    }
}
