<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container margin-top-bottom">
    <h2>Bedankt voor uw reservering!</h2>

    <?php
    $bookingId = htmlspecialchars($_GET['bookingid']);
    $email = htmlspecialchars($_GET['email']);
    ?>
    <div class="alert alert-success" role="alert">
        <p>Uw reservering is bij ons binnen! Uw reserveringsnummer is: <?= $bookingId; ?></p>
        <p>Het email adres dat wij hebben ontvangen van u is: <?= $email; ?> </p>
        <p>Wij kijken er naar uit u te mogen verwelkomen!</p>
        <p>Tot snel.</p>
    </div>

    <a href="/" class="btn btn-primary" id="hero_button">Ga terug naar de homepagina</a>
    <a href="<?='/contact?bookingid=' . $bookingId ?>" class="btn btn-primary" id="hero_button">Nog vragen?</a>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>