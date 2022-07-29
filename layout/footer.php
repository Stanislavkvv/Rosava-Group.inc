<footer>
    <nav class="downMenu">
        <div class="container">
            <div class="links">
                <h3 class="title">Quick Links</h3>
                <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#services">Our Services</a></li>
                <li><a href="index.php#whyWe">Why Choose us</a></li>
                <li><a href="index.php#info">Locations</a></li>
                <li><a href="index.php#info">Contacts</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="index.php"><img src="img/Logo.png" alt="Logo"></a>
                <p><?php echo CONFIG::getDescription()?></p>
            </div>
            <div class="contacts">
                <h3 class="title">Contacts Information</h3>
                <ul>
                    <li><img src="img/assets/location.png" alt="Location"><?php echo CONFIG::getLocation()?></li>
                    <li>
                        <img src="img/assets/phone.png" alt="Phone">
                        <div class="links">
                            <?php 
                                $phones = CONFIG::getPhone();
                                for ($i=0; $i < count($phones); $i++) { 
                                    ?><a href="tel:<?php echo $phones[$i]["config_value"]?>"><?php echo CONFIG::getFormatPhone($phones[$i]["config_value"])?></a><?php
                                }
                            ?>
                        </div>
                        
                    </li>
                    <li><img src="img/assets/gmail.png" alt="Mail"><a href="mailto:<?php echo CONFIG::getMail()?>"><?php echo CONFIG::getMail()?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <script src="js/index.js"></script>

</footer>