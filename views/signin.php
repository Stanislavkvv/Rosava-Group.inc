<?php
	if (isset($_SESSION["auth"])&&$_SESSION["auth"] == true) {
		header( 'Location: index.php' );
	} else {
        $error = false;
		if(!empty($_POST)){
            $mysqli = DATABASE::Connect();
            $mysqli->set_charset("utf8mb4");
			$username = $_POST['login'];
            $user = USER::getUserByLogin($mysqli,$username);
            if($user==null){
                $error = true;
            } else {
                $password = $_POST['password'];
                $passwordBD = $user["password"];
                if(password_verify($password, $passwordBD)==true){
                    $_SESSION["ID"] = $user["id"];
                    $_SESSION["USERNAME"] = $user["username"];
                    if (intval($user["isAdmin"]) == 1) {
                        $_SESSION["isAdmin"] = true;
                    } else {
                        $_SESSION["isAdmin"] = false;
                    }
                    $_SESSION["auth"] = true;
                    ?>
                        <script>window.location.href = "index.php?action=logSuccess"</script> 
                    <?php
                }
            }
        }
        ?>  
        <main id="signIn">
            <div class="container">
                <?php if($error==true){?>  
                <div class="signInError error">Invalid username or password</div>
                <?php }?>
                <form action="" method="post">
                    <input type="text" name="login">
                    <input type="password" name="password">
                    <button type="submit">Sign in</button>
                </form>
            </div>
        </main>
        <?php
    }
?>
	