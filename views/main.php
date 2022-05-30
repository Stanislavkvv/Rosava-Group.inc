<?php
    if(isset($_POST)&&isset($_POST["application"])){
        $mysqli = DATABASE::Connect();
        $sql = "INSERT INTO `application` (`App_name`,`App_Mail`,`App_Phone`,`App_Code`,`App_Services`,`App_Driving_Experience`,`App_HowKnow`) VALUES (?,?,?,?,?,?,?);"; // SQL with parameters
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssss",$_POST["name"],$_POST["mail"],$_POST["tel"],$_POST["code"],$_POST["services"],$_POST["driving_experience"],$_POST["contact_about_us"]); 
        $stmt->execute();
        ?>
        <script>
            let applicationEndTime = new Date();
            applicationEndTime.setHours(applicationEndTime.getHours() + 24)
            localStorage.setItem('applicationEndTime',applicationEndTime)
            window.location.href = "index.php?action=applicationSussess"
        </script> 
        <?php
    }
?>
<main>
    <section class="hello">
        <div class="container">
            <h1><span class="yellow">Rosava</span> <span class="green">Group</span></h1>
            <h2>Efficient. Safe. Reliable.</h2>
        </div>
    </section>
    <section class="services" id="services">
        <div class="container">
            <h1>ROSAVA GROUP</h1>
            <h3><?php echo CONFIG::getDescription()?></h3>
            <div class="services__service__block">
                <div class="services__service" href="#">
                    <a href="#">Solo Driver</a>
                    <img src="img/assets/solo_driver.jpg" alt="Solo Driver">
                </div>
                <div class="services__service" href="#">
                    <a href="#">Owner Operator</a>
                    <img src="img/assets/own_operator.jpg" alt="Solo Driver">
                </div>
                    <div class="services__service" href="#">
                    <a href="#">Team Drivers</a>
                    <img src="img/assets/team_drivers.jpg" alt="Solo Driver">
                </div>
            </div>
        </div>
    </section>
    <section class="applyToDrive" id="applyToDrive">
        <div class="container">
            <div class="applyToDrive__photo">
                <img src="img/assets/aplication.jpg" alt="Application Photo">
            </div>
            <div class="applyToDrive__form">
                <h2>APPLY TO DRIVE FOR ROSAVA GROUP!</h2>
                <form action="index.php" method="POST" onsubmit="formApplicationSubmit(event)">
                    <input type="hidden" name="application">

                    <input type="text" maxlength="50" placeholder="Name" required name="name" id="name" pattern="[a-zA-Z'-'\s]*">

                    <input type="email" placeholder="Email Address" required name="mail">

                    <input type="text" minlength="10" placeholder="Phone Number , example <?php echo CONFIG::getPhone()[0]["config_value"]?>" required name="tel" pattern="+1[0-9]{10}">

                    <input type="text" maxlength="50" placeholder="Zip Code" pattern="[0-9\s-]{4,6}" required name="code">

                    <select name="services" id="services" required>
                        <option value>I am applying for</option>
                        <option value="Solo">Solo Driver</option>
                        <option value="Owner">Owner Operator</option>
                        <option value="Team">Team Drivers</option>
                    </select>

                    <select name="driving_experience" id="driving_experience" required>
                        <option value="">CDL Driving Experience</option>
                        <option value="0">No experience</option>
                        <option value="<1">Under 1 year</option>
                        <option value="1+">More than 1 year</option>
                    </select>

                    <select name="contact_about_us" id="contact_about_us" required>
                        <option value="">How did you hear about us?</option>
                        <option value="Google">Google</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Craigslist">Craigslist</option>
                        <option value="Referral">Referral</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="btns">
                        <button type="reset">RESET</button>
                        <button type="submit">SUBMIT</button>
                    </div>
                    <p id="wait"><img src="img/assets/warning.png" alt="Warning">You can send 1 application in 24 hours!<img src="img/assets/warning.png" alt="Warning"></p>
                </form>
            </div>
        </div>
    </section>
    <section class="info" id="info">
        <div class="container">
            <div class="info">
                <h2 class="title">Contact Us</h2>
                <ul>
                    <li>
                        <img src="img/assets/phone.png" alt="Phone">
                        <?php 
                            $phones = CONFIG::getPhone();
                            for ($i=0; $i < count($phones); $i++) { 
                                ?><a href="tel:<?php echo $phones[$i]["config_value"]?>"><?php echo CONFIG::getFormatPhone($phones[$i]["config_value"])?></a><?php
                            }
                        ?>
                    </li>
                    <li>
                        <img src="img/assets/fax.png" alt="Fax">
                        <a href="https://www.paygofax.com/?fax=<?php echo CONFIG::getFormatFax(CONFIG::getFax())?>" target="_blank"><?php echo CONFIG::getFormatPhone(CONFIG::getFax())?></a>
                    </li>
                    <li><img src="img/assets/gmail.png" alt="Mail"><a href="mailto:<?php echo CONFIG::getMail()?>"><?php echo CONFIG::getMail()?></a></li>
                    <li><img src="img/assets/location.png" alt="Location"><a target="_blank"><?php echo CONFIG::getLocation()?></a></li>
                    <li><img src="img/assets/facebook.png" alt="Facebook"><a href="<?php echo CONFIG::getFacebook()?>">Rosava Group</a></li>
                    <li><img src="img/assets/instagram.png" alt="Instagram"><a href="<?php echo CONFIG::getInstagram()?>">Rosava Group</a></li>
                </ul>
            </div>
            <div class="map">
                <h2 class="title">Our Office Here</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.7724141028566!2d-87.87601708469116!3d41.96222317921562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fb5ea63a4dc5f%3A0xa4a4878460848b5d!2s4612%20Hirschberg%20Ave%2C%20Schiller%20Park%2C%20IL%2060176%2C%20USA!5e0!3m2!1sen!2sua!4v1653552812106!5m2!1sen!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>