<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<h2>Gelukt!</h2>

<?php
$bookingId = $_GET['bookingid'];
$email = $_GET['email'];

echo '<div class="alert alert-success" role="alert">';
echo '<p>Uw reservering is bij ons binnen! Uw reserveringsnummer is: ' . $bookingId . '</p>';
echo '<p>Het email address wat wij hebben ontvangen van u is: ' . $email . ' </p>';
echo '<p>Wij kijken er naar uit u te mogen verwelkomen! Tot snel.</p>';
echo '</div>';
?>

<a href="/" class="btn btn-primary" id="hero_button">Ga terug naar de homepagina</a>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>