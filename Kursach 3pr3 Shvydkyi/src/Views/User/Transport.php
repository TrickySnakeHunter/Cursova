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
      <form action="../User/Transport.php" method="post" >
       
        <label>Model</label>
        <input type="text" name="model"><br><br>
        <label>Weels</label>
        <input type="number" name="weels"><br><br>
        <label>Color</label>
        <input type="text" name="color"><br><br>
        <label>Year</label>
        <input type="text" name="year"><br><br>
        <label>Cleared</label>
        <input type="text" name="cleared"><br><br>
        <label>Insurance</label>
        <input type="text" name="insurance"><br><br>
        <label>Serviceable</label>
        <input type="text" name="serviceable"><br><br>
        <label>Number</label><br>
        <label>regestration</label>
        <input type="number" name="num_regestration"><br><br>
        <label>Gas</label>
        <input type="text" name="gas"><br><br>
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

      

        <label>Img</label>
        <input type="text" name="img"><br><br>
        <label>comment</label>
        <textarea name="comment"></textarea><br><br>
        <div class="submit"><br>

          <input type="submit" name="save" value="Save">
        </div>
    </div>
    </form>
  </div>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");
  $userModel = new UserModel();
  // Connect to MySQL (Replace these values with your database information)

  // Check if the form is submitted
  if (isset($_POST["save"])) {
    // Get form data
    if (isset($_POST["img"]))
      $img = $_POST["img"];
    if (isset($_POST["model"]))
      $model = $_POST["model"];
    if (isset($_POST["weels"]))
      $weels = $_POST["weels"];
    if (isset($_POST["color"]))
      $color = $_POST["color"];
    if (isset($_POST["year"]))
      $year = $_POST["year"];
    if (isset($_POST["cleared"]))
      $cleared = $_POST["cleared"];
    if (isset($_POST["insurance"]))
      $insurance = $_POST["insurance"];
    if (isset($_POST["serviceable"]))
      $serviceable = $_POST["serviceable"];
    if (isset($_POST["num_regestration"]))
      $num_regestration = $_POST["num_regestration"];
    if (isset($_POST["gas"]))
      $gas = $_POST["gas"];
    if (isset($_POST["comment"]))
      $comment = $_POST["comment"];
    echo $_COOKIE["UserNum"];

    $price = $_POST["price"];
                $selingS = $_POST["selingS"];
                $selingE = $_POST["selingE"];
                $date = $_POST["date"];
                $idLot=$userModel->generateId("transport");
    // Prepare and execute SQL query to insert data into the table (Replace 'your_table_name' with your actual table name)
    $sql = "INSERT INTO `transport`(`id`, `img`, `model`, `weels`, `color`, `year`, `cleared`, `insurance`, `serviceable`, `num_regestration`, `gas`, `description`, `id_user`)
         VALUES ('" . $idLot . "','" . $img . "','" . $model . "','" . $weels . "','" . $color . "','" . $year . "','" . $cleared . "','" . $insurance . "','" . $serviceable . "','" . $num_regestration . "','" . $gas . "','" . $comment . "','" . $_COOKIE["UserNum"] . "')";
    $userModel->setData($sql);
    $sql = "INSERT INTO `trading`(`id`, `id_lot`, `owner`, `winner`, `starting_price`, `winn_price`, `start_time`, `end_time`, `date`)
     VALUES ('" . $userModel->generateId("buisness") . "','" . $idLot . "','" . $_COOKIE["UserNum"] . "','0','" . $price . "','','" . $selingS . "','" . $selingE . "','" . $date . "')";
                $userModel->setData($sql);

                echo '<script>
                window.close("../src/Views/User/User.php");
                
              </script>';
  }   ?>
  </div>
  </div>

</body>
