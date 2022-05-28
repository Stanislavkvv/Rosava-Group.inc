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
                } else {
                    $error = true;
                }
            }
        }
        ?>  
        <main id="signIn" class="message">
            <div class="blur"></div>
            <div class="container">
                <div class="form__block">
                    <div class="photo">
                        <img src="img/Logo.png" alt="Logo">
                    </div>
                    <h2 class="title">Log In</h2>
                    <form action="" method="post">
                        <div class="formInput">
                            <label for="login">Username</label>
                            <input type="text" name="login" required minlength="4" maxlength="32" placeholder="Username" id="login">
                            <img src="img/assets/login.png" alt="Login">
                        </div>
                        <div class="formInput">
                            <label for="password">Password</label>
                            <input type="password" name="password" required minlength="8" maxlength="32" placeholder="Password" id="password">
                            <img src="img/assets/lock.png" alt="Login">
                        </div>

                        <button type="submit">Log In</button>
                    </form>
                    <?php if($error==true){?>  
                        <div class="signInError error">Invalid username or password</div>
                    <?php }?>
                </div>
            </div>
        </main>
        <?php
    }
?>
	