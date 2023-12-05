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
                <form action="../User/Buisness.php" method="post">
                    <!-- Add your form fields here for the business table -->
                    <label>Name</label>
                    <input type="text" name="name"><br>
                    <label>Type</label>
                    <input type="text" name="type"><br>
                    <label>Products</label>
                    <input type="text" name="products"><br>
                    <label>Services</label>
                    <input type="text" name="services"><br><br>
                    <label>Licenses</label>
                    <input type="text" name="licenses"><br><br>
                    <label>Certifications</label>
                    <input type="text" name="certifications"><br><br>
                    <label>Capital</label>
                    <input type="number" name="capital"><br><br>
                    <label>Debts</label>
                    <input type="number" name="debts"><br><br>
                    <label>Staff</label>
                    <input type="number" name="staff"><br><br>
                    <label>Assets</label>
                    <input type="number" name="assets"><br><br>
                    <label>Founded</label>
                    <input type="date" name="founded"><br><br>
                    <br>

                    <label>Peice</label>
                    <input type="num" name="price"><br>
                    <label>Start selling</label>
                    <input type="time" name="selingS"><br><br>
                    <label>End selling</label>
                    <input type="time" name="selingE"><br><br>
                    <label>Date</label>
                    <input type="date" name="date"><br>

                    <label>Img</label><br>
                    <input type="text" name="img"><br>
                    <label>Description</label><br>
                    <textarea name="description"></textarea>

                    <div class="submit"><br>

                        <input type="submit" name="save" value="Save">
                    </div>
            </div>

            </form>

            <?php

            include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");
            $userModel = new UserModel();

            // Check if the form is submitted
            if (isset($_POST["save"])) {
                // Get form data
                $name = $_POST["name"];
                $type = $_POST["type"];
                $products = $_POST["products"];
                $services = $_POST["services"];
                $licenses = $_POST["licenses"];
                $certifications = $_POST["certifications"];
                $capital = $_POST["capital"];
                $debts = $_POST["debts"];
                $staff = $_POST["staff"];
                $assets = $_POST["assets"];
                $founded = $_POST["founded"];
                $description = $_POST["description"];
                $img = $_POST["img"];

                $price = $_POST["price"];
                $selingS = $_POST["selingS"];
                $selingE = $_POST["selingE"];
                $date = $_POST["date"];

                $idLot = $userModel->generateId("buisness");
                // Prepare and execute SQL query to insert data into the business table
                $sql = "INSERT INTO `buisness`(`id`, `name`, `type`, `products`, `services`, `licenses`, `certifications`, `capital`, `debts`, `staff`, `assets`, `founded`, `description`, `id_user`, `img`)
        VALUES ('" . $idLot . "','" . $name . "','" . $type . "','" . $products . "','" . $services . "','" . $licenses . "','" . $certifications . "','" . $capital . "','" . $debts . "','" . $staff . "','" . $assets . "','" . $founded . "','" . $description . "','" . $_COOKIE["UserNum"] . "','" . $img . "')";

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