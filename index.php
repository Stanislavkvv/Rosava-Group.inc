<?php
    session_start();
    require_once("models/database.php");
    require_once("models/user.php");
    require_once("models/config.php");
    require_once("layout/head.php");
    require_once("layout/header.php");

    if(isset($_GET["action"])){
        $a = $_GET["action"];
        if (file_exists("views/".$a.".php")) {
            require_once("views/".$a.".php");
        }	else {
            require_once("views/404.php");
        }
    }
    else {
        require_once("views/main.php");
    }

    require_once("layout/footer.php");
?>