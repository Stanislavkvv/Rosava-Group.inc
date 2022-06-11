<?php
    if(isset($_POST)&&isset($_POST["application"])){
        CONFIG::sendApplication($_POST);
        ?>
        <script>
            let applicationEndTime = new Date();
            applicationEndTime.setHours(applicationEndTime.getHours() + 24)
            localStorage.setItem('applicationEndTime',applicationEndTime)
            window.location.href = "index.php?action=applicationSussess"
        </script> 
        <?php
    }
    if(isset($_GET["type"])&&$_GET["type"]=="solo"||$_GET["type"]=="owner"||$_GET["type"]=="team"){
    ?>
    <main>
        <section class="jobs">
            <div class="container">
                <div class="hello">
                    <div class="info">
                        <h2 class="title">
                            <?php
                                if($_GET["type"]=="solo"){
                                ?>
                                    Solo Driver
                                <?php
                                } else if($_GET["type"]=="owner"){
                                ?>
                                    Owner Operator
                                <?php
                                } else if($_GET["type"]=="team"){
                                ?>
                                    Team Drivers
                                <?php
                                }
                            ?>
                        </h2>
                        <p class="desc">
                        <?php
                            if($_GET["type"]=="solo"){
                            ?>
                                We have high-earning solo driver opportunities. <br>
                                Better Pay, Home Time, and Miles. <br>
                                Type of freight you haul: dry van.
                            <?php
                            } else if($_GET["type"]=="owner"){
                            ?>
                                Our program is designed to provide owner operators with consistent profits needed for success. <br>
                                We will be your partner on the path to fleet ownership.
                            <?php
                            } else if($_GET["type"]=="team"){
                            ?>
                                Hiring established professional team drivers. <br>
                                Excellent income for coast to coast team lanes.
                            <?php
                            }
                        ?>
                        </p>
                        <a href="#application">Fill Out Application</a>
                    </div>
                    <div class="photo">
                        <img src="img/assets/<?php echo $_GET['type']; ?>.jpg" alt="<?php echo $_GET['type']; ?>" class="<?php echo $_GET['type']; ?>">
                    </div>
                </div>
                <div class="need">
                    <div class="requirements">
                        <h2 class="title">Requirements</h2>
                        <ul>
                        <?php
                            if($_GET["type"]=="solo"){
                            ?>
                               <li>Must Have 1+ yr CDL experience</li>
                               <li>Clean MVR and reasonable PSP report</li>
                               <li>Haul all types of freight</li>
                               <li>Options for drop and hook as well as no touch</li>
                               <li>Hiring in 48 States</li>
                               <li>Paid on all miles</li>
                            <?php
                            } else if($_GET["type"]=="owner"){
                            ?>
                                <li>3 Years experience</li>
                                <li>Clean MVR and Reasonable PSP report</li>
                                <li>Dry Van</li>
                                <li>All No Touch Freight… Lots of drop and hook</li>
                                <li>Hiring in 48 States</li>
                                <li>Trucks no less than 5 years old</li>
                            <?php
                            } else if($_GET["type"]=="team"){
                            ?>
                                <li>Must Have 1+ yr CDL experience</li>
                                <li>Clean MVR and reasonable PSP report</li>
                                <li>Haul all types of freight</li>
                                <li>Options for drop and hook as well as no touch freight</li>
                                <li>Hiring in 48 states</li>
                                <li>Milles split with drivers</li>
                            <?php
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="benefits">
                        <h2 class="title">Compensation & Benefits</h2>
                        <ul>
                        <?php
                            if($_GET["type"]=="solo"){
                            ?>
                               <li>Weekly settlements with direct deposit</li>
                               <li>Up to 70₵ per mile, depending on EXP & Driving history</li>
                               <li>Healthcare, Dental, Vision and Life Insurance</li>
                            <?php
                            } else if($_GET["type"]=="owner"){
                            ?>
                                <li>Weekly settlement with direct deposit</li>
                                <li>80/20 split on load</li>
                                <li>Lease to own available</li>
                                <li>Gross income up to $150.000 per year</li>
                                <li>Dedicated Dispatcher</li>
                                <li>Healthcare and insurances available</li>
                            <?php
                            } else if($_GET["type"]=="team"){
                            ?>
                                <li>Weekly settlements with direct deposit</li>
                                <li>Earn up to $0.86 per mile depending on experience & driving history</li>
                                <li>Coast to coast team lanes available</li>
                                <li>Healthcare, dental, vision and life insurance able</li>
                                <li>New model trucks (never more than 3 yrs old)</li>
                            <?php
                            }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="applyToDrive" id="application">
                    <div class="container">
                        <div class="applyToDrive__photo">
                            <img src="img/assets/aplication.jpg" alt="Application Photo">
                        </div>
                        <div class="applyToDrive__form">
                            <h2>APPLY TO DRIVE FOR ROSAVA GROUP!</h2>
                            <form action="index.php" method="POST" onsubmit="formApplicationSubmit(event)">
                                <input type="hidden" name="application">

                                <input type="text" placeholder="Name" required name="name" id="name" pattern="[a-zA-Z'-'\s]*">

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
            </div>
        </section>
    </main>
    <?php
    } else {
    ?>
        <script>window.location.href = "index.php?action=404"</script>
    <?php
    }
?>