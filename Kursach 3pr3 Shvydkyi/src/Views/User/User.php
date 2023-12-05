
       <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['delete'])) {
               include($_SERVER['DOCUMENT_ROOT'] . "../src/Models/User/UserModel.php");
               $userModel = new UserModel();
               $userModel->deleteRowid($_COOKIE["Action2"], $_POST['delete']);
               $userModel->deleteRow("trading", "id_lot", $_POST['delete']);
               exit();
            }
            if (isset($_POST['new'])) {
               include($_SERVER['DOCUMENT_ROOT'] . "../src/Views/User/" . $_COOKIE["Action2"] . ".php");
            }
         }

         ?>
  