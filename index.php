<?php
    require_once("layout/head.php");
    require_once("layout/header.php");
    require_once("models/database.php");

    if(isset($_POST)&&count($_POST)>0){
        $mysqli = DATABASE::Connect();
		$sql = "INSERT INTO `application` (`App_name`,`App_Mail`,`App_Phone`,`App_Code`,`App_Services`,`App_Driving_Experience`,`App_HowKnow`) VALUES (?,?,?,?,?,?,?);"; // SQL with parameters
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssssss",$_POST["name"],$_POST["mail"],$_POST["tel"],$_POST["code"],$_POST["services"],$_POST["driving_experience"],$_POST["contact_about_us"]); 
		$stmt->execute();
        ?>
        <script>window.location.href = "/?action=applicationSussess"</script> 
        <?php
    }
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