<div class="action_container">
    <div class="filter_container ">
        <form method="post" accept="../src/Views/Action/Action.php">
            <ul class="list_filters_container">
                <li class="filter_nav_menu"><input name="actions2" type="submit" value="Transport"></li>
                <li class="filter_nav_menu "><input name="actions2" type="submit" value="Things"></li>
                <li class="filter_nav_menu  "><input name="actions2" type="submit" value="Property"></li>
                <li class="filter_nav_menu  "><input name="actions2" type="submit" value="Equipment"></li>
                <li class="filter_nav_menu  "><input name="actions2" type="submit" value="Buisness"></li>
                <li class="filter_nav_menu "><input name="actions2" type="submit" value="Securities"></li>
            </ul>

        </form>
        <?php

        if (isset($_POST["actions2"])) {
            setcookie("Action2", $_POST['actions2']);
            header("Location:index.php");
        }
        ?>
    </div>
</div>