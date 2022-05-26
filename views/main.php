<main>
    <section class="hello">
        <div class="container">
            <h1><span class="yellow">Rosava</span> <span class="green">Group</span></h1>
            <h2>Efficient. Safe. Reliable.</h2>
        </div>
    </section>
    <section class="services">
        <div class="container">
            <h1>ROSAVA GROUP</h1>
            <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis beatae aperiam, voluptas eligendi nulla rerum ipsam recusandae perspiciatis ad unde ratione, quas, omnis sequi corrupti facere debitis est dolorum. Laborum?</h3>
            <div class="services__service__block">
                <div class="services__service" href="#">
                    <a href="#">Solo Driver</a>
                    <img src="/img/assets/solo_driver.jpg" alt="Solo Driver">
                </div>
                <div class="services__service" href="#">
                    <a href="#">Owner Operator</a>
                    <img src="/img/assets/own_operator.jpg" alt="Solo Driver">
                </div>
                    <div class="services__service" href="#">
                    <a href="#">Team Drivers</a>
                    <img src="/img/assets/team_drivers.jpg" alt="Solo Driver">
                </div>
            </div>
        </div>
    </section>
    <section class="applyToDrive" id="applyToDrive">
        <div class="container">
            <div class="applyToDrive__photo">
                <img src="/img/assets/aplication.jpg" alt="Application Photo">
            </div>
            <div class="applyToDrive__form">
                <h2>APPLY TO DRIVE FOR ROSAVA GROUP!</h2>
                <form action="/" method="POST">
                    <input type="text" maxlength="50" placeholder="Name" required name="name" id="name" pattern="[A-Za-z]">

                    <input type="email" placeholder="Email Address" required name="mail">

                    <input type="tel" maxlength="20" placeholder="Phone Number" required name="tel">

                    <input type="text" maxlength="50" placeholder="Zip Code" pattern="[0-9\s-]{4,6}" required name="code">

                    <select name="services" id="services" required>
                        <option value>I am applying for</option>
                        <option value="Solo">Solo Driver</option>
                        <option value="Owner">Owner Operator</option>
                        <option value="Team">Team Drivers</option>
                    </select>

                    <select name="driving_experience" id="driving_experience" required>
                        <option value="">CDL Driving Experience</option>
                        <option value="No experience">No experience</option>
                        <option value="Under 1 year">Under 1 year</option>
                        <option value="More than 1 year">More than 1 year</option>
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
                        <img src="/img/assets/phone.png" alt="Phone">
                        <a href="tel:+13312252027">+1 (331) 225 2027</a>
                        <a href="tel:+17736278837">+1 (773) 627 8837</a>
                    </li>
                    <li>
                        <img src="/img/assets/fax.png" alt="Fax">
                        <a href="https://www.paygofax.com/?company=Rosava Group&fax=13312252028" target="_blank">+1 (331) 225 2028</a>
                    </li>
                    <li><img src="/img/assets/gmail.png" alt="Mail"><a href="mailto:rosavagroup@yahoo.com">rosavagroup@yahoo.com</a></li>
                    <li><img src="/img/assets/location.png" alt="Location"><a target="_blank" href="https://maps.google.com/maps?ll=41.962223,-87.873828&z=16&t=m&hl=en&gl=UA&mapclient=embed&q=4612%20Hirschberg%20Ave%20Schiller%20Park%2C%20IL%2060176%20USA">4612 Hirschberg Ave Schiller Park, IL 60176 USA</a></li>
                    <li><img src="/img/assets/facebook.png" alt="Facebook"><a href="#">Rosava Group</a></li>
                    <li><img src="/img/assets/instagram.png" alt="Instagram"><a href="#">Rosava Group</a></li>
                </ul>
            </div>
            <div class="map">
                <h2 class="title">Our Office Here</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.7724141028566!2d-87.87601708469116!3d41.96222317921562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fb5ea63a4dc5f%3A0xa4a4878460848b5d!2s4612%20Hirschberg%20Ave%2C%20Schiller%20Park%2C%20IL%2060176%2C%20USA!5e0!3m2!1sen!2sua!4v1653552812106!5m2!1sen!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>