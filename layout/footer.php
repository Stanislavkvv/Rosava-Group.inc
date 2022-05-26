<footer>
    <nav class="downMenu">
        <div class="container">
            <div class="links">
                <h3 class="title">Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About Us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Why Choose us</a></li>
                    <li><a href="#">Locations</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="/"><img src="img/Logo.png" alt="Logo"></a>
                <p>TOP Masonry&Tuckpointing is a full service masonry, E.I.F.S./stucco and caulking contractor serving architects, construction managers, condominium associations, developers, general contractors, homeowners and private and public institutions.</p>
            </div>
            <div class="contacts">
                <h3 class="title">Contacts Information</h3>
                <ul>
                    <li><img src="img/assets/location.png" alt="Location"><a target="_blank" href="https://maps.google.com/maps?ll=41.962223,-87.873828&z=16&t=m&hl=en&gl=UA&mapclient=embed&q=4612%20Hirschberg%20Ave%20Schiller%20Park%2C%20IL%2060176%20USA">4612 Hirschberg Ave Schiller Park, IL 60176 USA</a></li>
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