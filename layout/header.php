<body>
    <header class="head">
        <div class="container">
            <a href="index.php" class="logo"><img src="img/Logo.png" alt="Logo"></a>
            <ul class="contacts">
                <li>
                    <img src="img/assets/phone.png" alt="Phone">
                    <?php 
                        $phones = CONFIG::getPhone();
                        for ($i=0; $i < count($phones); $i++) { 
                            if($i==0){
                                ?><a href="tel:<?php echo $phones[$i]["config_value"]?>"><?php echo CONFIG::getFormatPhone($phones[$i]["config_value"])?></a><?php
                            } else {
                                ?><span>|</span><a href="tel:<?php echo $phones[$i]["config_value"]?>"><?php echo CONFIG::getFormatPhone($phones[$i]["config_value"])?></a><?php
                            }
                        }
                    ?></li>
                <li><a href="mailto:<?php echo CONFIG::getMail()?>"><img src="img/assets/gmail.png" alt="Mail"><?php echo CONFIG::getMail()?></a></li>
                <li>Follow Us: 
                    <ul class="media">
                        <li><a href="<?php echo CONFIG::getFacebook()?>"><img src="img/assets/facebook.png" alt="Facebook"></a></li>
                        <li><a href="<?php echo CONFIG::getInstagram()?>"><img src="img/assets/instagram.png" alt="Instagram"></a></li>
                    </ul>
                </li>
                <li>
                    <?php
                        if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true) {
                            ?>
                        <a class="signin" href="index.php?action=admin">Admin</a>
                        <?php 
                            if (!empty($_POST)&&isset($_POST["isLogout"])) {
                                $isLogout = $_POST["isLogout"];
                                if($isLogout=="true"){	
                                    session_unset();
                                    header( 'Location: index.php' );
                                    exit();
                                }
                            } else {
                                ?>
                                <div class="content">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" name="isLogout" value="true">
                                        <button class="logout"><i class='bx bx-log-out'></i></button>
                                    </form>	
                                </div>
                                <?php
                            }
                        } else { 
                    ?>
                        <a class="signin" href="index.php?action=signin">Sign in</a>
                    <?php
                        }
                    ?>
                </li>
            </ul>
        </div>
    </header>
    <header class="body">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Why Choose us</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
    </header> 