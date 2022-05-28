<?php
	if(!isset($_SESSION["auth"])||(isset($_SESSION["auth"])&&$_SESSION["auth"]==false)){
		?>
            <script>window.location.href = "index.php"</script> 
        <?php
	} else {
?>
    <main id="success" class="message">
        <div class="blur"></div>
        <div class="container">
            <div class="successBlock">
                <div class="head">
                    <img src="img/assets/success.png" alt="Success">
                </div>
                <div class="body">
                    <p class="congrats">Congratulations! <br> You have successfully logged in.</p>
                    <a href="index.php">Main Page</a>
                    <?php
                        if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true) {
                            ?>
                                <a href="index.php?action=admin">Admin Panel</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php
    }
?>