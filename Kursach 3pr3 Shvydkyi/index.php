<?php
session_start();

    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    $postData = "Home";
    $user = "Sigin";

    if (isset($_COOKIE["User"]))
        $user = $_COOKIE["User"];

        if(isset($_POST["outData"])){
            setcookie("ActionId",$_POST["outData"]);
           
            
            echo'<script> window.open("../src/Views/Info/info.html")</script>';
        }
    $searchData = "";

    include($docRoot . '../src/Controllers/HomeController.php');
    include($docRoot . '../src/Views/Views.php');

    if (isset($_COOKIE["Home"]))
        $postData =  $_COOKIE["Home"];
    if (isset($_COOKIE["Home"]) == null)
        $postData = "Home";
    if (isset($_COOKIE["Search"]))
        $searchData = $_COOKIE["Search"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sold</title>
      
        <link rel="stylesheet" href="../res/css/action.css">
        <link rel="stylesheet" href="../res/css/style.css">
        <link rel="stylesheet" href="../res/css/header.css">
        <link rel="stylesheet" href="../res/css/info.css">
        
       

    </head>

    <body>

        <header class="header">
            <div class="head_conteiner  ">
                <nav id="head_nav" class="head_nav  __tool_bar">
                    <div class="head_nav_menu  __toll_bar">
                        <form method="post">
                            <ul class="head_nav_menu  __list">
                                <li class="head_nav_menu  __list_item __home"><input type="submit" name="action" value="Home"></li>
                                <li class="head_nav_menu  __list_item"> <input type="submit" name="action" value="Action"></li>
                                <li class="head_nav_menu  __list_item"> <input type="submit" name="action" value="Balanse"></li>
                                <li class="head_nav_menu  __list_item  __right_item">
                                    <label for="user"> <?php echo $user ?></label>
                                    <input id="user" type="submit" name="action" <?php if (!($user == "Sigin")) {
                                                                                        echo "value= user";
                                                                                    } else echo "value=" . $user ?>>
                                </li>
                            </ul>
                        </form>
                    </div>

                    <div class="search_nav_menu">
                        <form method="post">
                            <div class="__list_item">
                                <input type="submit" name="Clear" value="Clear">
                            </div>

                            <input class="search_item" type="text" name="searchText" <?php echo "value=" . $searchData; ?>>

                            <div class="__list_item">
                                <input type="submit" name="search" value="Search">
                            </div>
                        </form>
                    </div>


                    <?php
                    if (isset($_POST['action'])) {
                        setcookie("Home", $_POST['action']);
                        $postData = $_POST['action'];
                    }
                    if (isset($_POST['searchText'])) {
                        setcookie("Search", $_POST['searchText']);
                    }

                    if (isset($_POST['Clear'])) {
                        setcookie("Search", "", time() - 0);
                        $searchData = "";
                    }

                    $Controller = new HomeController($postData, $docRoot);
                    $View = new Views($postData, $docRoot);
                    try {
                        include($View->getTitle());
                    } catch (Exception $ex) {
                    }
                    ?>
                </nav>
            </div>
        </header>
        <div class="body_background">
            <?php
            try {
                include($View->getAction());
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>
        </div>
    </body>
    </html>
