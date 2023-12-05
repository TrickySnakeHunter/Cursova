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
            <form action="../User/Equipment.php" method="post" >
                <!-- Add your form fields here for the equipment table -->
                <label>Mark</label>
                <input type="text" name="mark"><br><br>
                <label>Material</label>
                <input type="text" name="material"><br><br>
                <label>Type</label>
                <input type="number" name="type"><br><br>
                <label>Create Day</label>
                <input type="date" name="createDay"><br><br>
                <label>Size</label>
                <input type="number" name="size"><br><br>
                
                <label>Color</label>
                <input type="text" name="color"><br><br>
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
                <textarea name="description"></textarea><br>

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
        $mark = $_POST["mark"];
        $material = $_POST["material"];
        $type = $_POST["type"];
        $createDay = $_POST["createDay"];
        $size = $_POST["size"];
        $description = $_POST["description"];
        $color = $_POST["color"];
        $img = $_POST["img"];

        $price = $_POST["price"];
                $selingS = $_POST["selingS"];
                $selingE = $_POST["selingE"];
                $date = $_POST["date"];
                $idLot=$userModel->generateId("equipment");
        // Prepare and execute SQL query to insert data into the equipment table
        $sql = "INSERT INTO `equipment`(`id`, `mark`, `material`, `type`, `createDay`, `size`, `description`, `color`, `img`.`id_user`)
        VALUES ('" .  $idLot. "','" . $mark . "','" . $material . "','" . $type . "','" . $createDay . "','" . $size . "','" . $description . "','" . $color . "','" . $img . "', '" . $_COOKIE["UserNum"] . "')";
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

</html>