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
                            if (!empty($_POST)&&isset($_POST["isLogout"])&&$_POST["isLogout"]=="true") {
                                $isLogout = $_POST["isLogout"];
                                session_unset();
                                ?>
                                    <script>window.location.href = "index.php"</script>
                                <?php
                            } else {
                                ?>
                                <div class="content">
                                    <form action="" method="POST">
                                        <input type="hidden" name="isLogout" value="true">
                                        <button class="logout"><i class='bx bx-log-out'></i></button>
                                    </form>	
                                </div>
                                <script>
                                    document.querySelector("header ul.contacts li form button").addEventListener("click",function() {
                                        if (window.confirm("Do you really want to log out?")) {
                                            this.parentElement.querySelector("input").setAttribute("value","true")
                                        } else {
                                            this.parentElement.querySelector("input").setAttribute("value","false")
                                        }
                                    })
                                </script>
                                <?php
                            }
                        } else { 
                    ?>
                        <a class="signin" href="index.php?action=login">Log In</a>
                    <?php
                        }
                    ?>
                </li>
            </ul>
            <button class="toggle"><img src="img/assets/menu.png" alt="Menu Button"></button>
        </div>
    </header>
    <header class="body">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#services">Our Services</a></li>
                <li><a href="index.php#whyWe">Why Choose us</a></li>
                <li><a href="index.php#info">Locations</a></li>
                <li><a href="index.php#info">Contacts</a></li>
            </ul>
        </div>
    </header> 
    <section class="mobileMenu">
        <div class="container">
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="index.php#services">Our Services</a></li>
                <li><a href="index.php#whyWe">Why Choose us</a></li>
                <li><a href="index.php#info">Locations</a></li>
                <li><a href="index.php#info">Contacts</a></li>
            </ul>
            <ul class="contacts">
                <li class="phones">
                    <img src="img/assets/phone.png" alt="Phone">
                    <?php 
                        $phones = CONFIG::getPhone();
                        for ($i=0; $i < count($phones); $i++) { 
                            if($i==0){
                                ?><a target="_" href="tel:<?php echo $phones[$i]["config_value"]?>"><?php echo CONFIG::getFormatPhone($phones[$i]["config_value"])?></a><?php
                            } else {
                                ?><span>|</span><a target="_blank" href="tel:<?php echo $phones[$i]["config_value"]?>"><?php echo CONFIG::getFormatPhone($phones[$i]["config_value"])?></a><?php
                            }
                        }
                    ?></li>
                <li class="mail"><a target="_blank" href="mailto:<?php echo CONFIG::getMail()?>"><img src="img/assets/gmail.png" alt="Mail"><?php echo CONFIG::getMail()?></a></li>
                <li>Follow Us: 
                    <ul class="media">
                        <li><a target="_blank" href="<?php echo CONFIG::getFacebook()?>"><img src="img/assets/facebook.png" alt="Facebook"></a></li>
                        <li><a target="_blank" href="<?php echo CONFIG::getInstagram()?>"><img src="img/assets/instagram.png" alt="Instagram"></a></li>
                    </ul>
                </li>
                <li class="login">
                    <?php
                        if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true) {
                            ?>
                        <a class="signin" href="index.php?action=admin">Admin</a>
                        <?php 
                            if (!empty($_POST)&&isset($_POST["isLogout"])&&$_POST["isLogout"]=="true") {
                                $isLogout = $_POST["isLogout"];
                                session_unset();
                                ?>
                                    <script>window.location.href = "index.php"</script>
                                <?php
                            } else {
                                ?>
                                <div class="content">
                                    <form action="" method="POST">
                                        <input type="hidden" name="isLogout" value="true">
                                        <button class="logout" type="submit">Log Out</button>
                                    </form>	
                                </div>
                                <script>
                                    document.querySelector("header ul.contacts li form button").addEventListener("click",function() {
                                        if (window.confirm("Do you really want to log out?")) {
                                            this.parentElement.querySelector("input").setAttribute("value","true")
                                        } else {
                                            this.parentElement.querySelector("input").setAttribute("value","false")
                                        }
                                    })
                                </script>
                                <?php
                            }
                        } else { 
                    ?>
                        <a class="signin" href="index.php?action=login">Log In</a>
                    <?php
                        }
                    ?>
                </li>
            </ul>

            <button class="close"><img src="img/assets/cross.png" alt="Close Btn"></button>
        </div>
    </section>