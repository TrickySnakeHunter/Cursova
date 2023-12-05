<?php
include("../User/Style.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
   <link rel="stylesheet" type="text/css" href="../res/css/categories.css">
 
<div class="containerr">
    <div class="replenishform">
        <div class="text_item">
            <p class="logo"><?php echo $_COOKIE["Action2"] ?></p>
            <form action="../User/Securities.php" method="post" >
                <!-- Add your form fields here for the securities table -->
                <label>Name</label>
                <input type="text" name="name"><br><br>
                <label>Type</label>
                <input type="text" name="type"><br><br>
                <label>Code</label>
                <input type="text" name="code"><br><br>
                <label>Issue Date</label>
                <input type="date" name="issue"><br><br>
                <label>Value</label>
                <input type="number" name="value"><br><br>
                <label>Img</label>
                <input type="text" name="img"><br><br>
                <br>
                <br>
                <label>Peice</label>
                    <input type="num" name="price"><br>
                    <label>Start selling</label>
                    <input type="time" name="selingS"><br><br>
                    <label>End selling</label>
                    <input type="time" name="selingE"><br><br>
                    <label>Date</label>
                    <input type="date" name="date"><br>

                <label>Description</label>
                <textarea name="description"></textarea>

                <div class="submit"><br>

                    <input type="submit" name="save" value="Save">
                </div>
        </div>
    </div>
</div>

</form>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");
$userModel = new UserModel();

// Check if the form is submitted
if (isset($_POST["save"])) {
    // Get form data
    $name = $_POST["name"];
    $type = $_POST["type"];
    $code = $_POST["code"];
    $issue = $_POST["issue"];
    $value = $_POST["value"];
    $img = $_POST["img"];
    $description=$_POST["description"];


    $price = $_POST["price"];
                $selingS = $_POST["selingS"];
                $selingE = $_POST["selingE"];
                $date = $_POST["date"];
                $idLot=$userModel->generateId("securities");
    // Prepare and execute SQL query to insert data into the securities table
    $sql = "INSERT INTO `securities`(`id`, `name`, `type`, `code`, `issue`, `id_user`, `img`, `value`.`description`)
        VALUES ('" .  $idLot. "','" . $name . "','" . $type . "','" . $code . "','" . $issue . "','" . $_COOKIE["UserNum"] . "','" . $img . "','" . $value ."','".$description. "')";
    $userModel->setData($sql);
    $sql = "INSERT INTO `trading`(`id`, `id_lot`, `owner`, `winner`, `starting_price`, `winn_price`, `start_time`, `end_time`, `date`)
     VALUES ('" . $userModel->generateId("buisness") . "','" . $idLot . "','" . $_COOKIE["UserNum"] . "','0','" . $price . "','','" . $selingS . "','" . $selingE . "','" . $date . "')";
                $userModel->setData($sql);

                echo '<script>
                window.close("../src/Views/User/User.php");
                
              </script>';
}
?>
 </div>
    </div>

</body>
