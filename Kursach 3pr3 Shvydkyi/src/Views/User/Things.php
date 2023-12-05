<?php
include("../User/Style.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../res/css/categories.css">
    <title>Document</title>
</head>

<body>
<div class="containerr">
    <div class="replenishform">
        <div class="text_item">
            <p class="logo"><?php echo $_COOKIE["Action2"] ?></p>
            <form action="../User/Things.php" method="post" >
                <!-- Add your form fields here for the things table -->
                <label>Type</label>
                <input type="text" name="type"><br><br>
                <label>Brand</label>
                <input type="text" name="brand"><br><br>
                <label>Color</label>
                <input type="text" name="color"><br><br>
                <label>Material</label>
                <input type="text" name="material"><br><br>
                <label>Size</label>
                <input type="text" name="size"><br><br>
                <label>State</label>
                <input type="text" name="state"><br><br>
                
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
        </form>
    </div>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");
    $userModel = new UserModel();

    // Check if the form is submitted
    if (isset($_POST["save"])) {
        // Get form data
        $type = $_POST["type"];
        $brand = $_POST["brand"];
        $color = $_POST["color"];
        $material = $_POST["material"];
        $size = $_POST["size"];
        $state = $_POST["state"];
        $description = $_POST["description"];
        $img = $_POST["img"];

        $price = $_POST["price"];
        $selingS = $_POST["selingS"];
        $selingE = $_POST["selingE"];
        $date = $_POST["date"];

        $idLot=$userModel->generateId("things");
        // Prepare and execute SQL query to insert data into the things table
        $sql = "INSERT INTO `things`(`id`, `type`, `brand`, `color`, `material`, `size`, `state`, `description`, `id_user`, `img`)
        VALUES ('" . $idLot . "','" . $type . "','" . $brand . "','" . $color . "','" . $material . "','" . $size . "','" . $state . "','" . $description . "','" . $_COOKIE["UserNum"] . "','" . $img . "')";
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
