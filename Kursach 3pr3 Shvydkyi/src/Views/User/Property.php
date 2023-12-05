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
<div class="containerr">
    <div class="replenishform">
        <div class="text_item">
            <p class="logo"><?php echo $_COOKIE["Action2"] ?></p>
            <form action="../User/Property.php" method="post" >
                <!-- Add your form fields here for the property table -->
                <label>Address</label>
                <textarea name="address"></textarea><br><br>
                <label>Type</label>
                <input type="text" name="type"><br><br>
                <label>Storeys</label>
                <input type="number" name="storeys"><br><br>
                <label>Floor</label>
                <input type="number" name="floor"><br><br>
                <label>Built</label>
                <input type="date" name="built"><br><br>
                <label>Area</label>
                <input type="number" name="area"><br><br>
                <label>Rooms</label>
                <input type="number" name="rooms"><br><br>
                <label>Repair</label>
                <input type="datetime-local" name="repair"><br><br>
                <label>Communications</label>
                <input type="text" name="communications"><br><br>
                <label>Structure</label>
                <input type="text" name="structure"><br><br>
               
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
        $address = $_POST["address"];
        $type = $_POST["type"];
        $storeys = $_POST["storeys"];
        $floor = $_POST["floor"];
        $built = $_POST["built"];
        $area = $_POST["area"];
        $rooms = $_POST["rooms"];
        $repair = $_POST["repair"];
        $communications = $_POST["communications"];
        $structure = $_POST["structure"];
        $description = $_POST["description"];
        $img = $_POST["img"];


        $price = $_POST["price"];
                $selingS = $_POST["selingS"];
                $selingE = $_POST["selingE"];
                $date = $_POST["date"];
                $idLot=$userModel->generateId("property");
        // Prepare and execute SQL query to insert data into the property table
        $sql = "INSERT INTO `property`(`id`, `adress`, `type`, `storeys`, `floor`, `built`, `area`, `rooms`, `repair`, `communications`, `structure`, `description`, `id_user`, `img`)
        VALUES ('" .  $idLot. "','" . $address . "','" . $type . "','" . $storeys . "','" . $floor . "','" . $built . "','" . $area . "','" . $rooms . "','" . $repair . "','" . $communications . "','" . $structure . "','" . $description . "','" . $_COOKIE["UserNum"] . "','" . $img . "')";
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