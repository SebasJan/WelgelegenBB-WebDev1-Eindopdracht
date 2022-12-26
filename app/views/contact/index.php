<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<body>
    <div class="container">
        <h1>Neem contact met ons op</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Embed Google Maps location here -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d384.87447842380203!2d7.429177317440153!3d43.74044940540296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf0d89598cdbf290e!2sFairmont%20Hairpin%20Curve%20Formula%201!5e1!3m2!1snl!2snl!4v1672053305327!5m2!1snl!2snl"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5">
                <!-- Contact form here -->
                <h3>Stuur ons gerust een berichtje met een vraag of opmerking ;)</h3>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="captcha" id="captchaLabel">Solve this math problem: 3 + 4 =</label>
                        <input type="text" class="form-control" id="captcha" placeholder="Enter the answer">
                    </div>
                    <button type="button" id="submitButton" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/contact.js"></script>

    <?php require_once __DIR__ . '/../components/footer.inc.php'; ?>