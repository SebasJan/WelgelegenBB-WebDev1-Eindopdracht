<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<?php
// TODO: via controller, use displayview from controller.php
# get query string
$beginDate = $_GET['beginDate'];
$endDate = $_GET['endDate'];
$amountOfGuests = $_GET['amountOfGuests'];
$amountOfGuestsChilderen = $_GET['amountOfGuestsChilderen'];

# get all rooms
require __DIR__ . '/../../repositories/bookingrepository.php';
$bookingRepository = new BookingRepository();
$rooms = $bookingRepository->getAvailableRooms($amountOfGuests, $amountOfGuestsChilderen, $beginDate, $endDate);

# check if there are rooms available
if (count($rooms) == 0) {
    // TODO: Dit moet nog netter
    echo '<script>alert("Er zijn geen kamers beschikbaar op de door u gekozen datum")</script>';
    echo '<script> window.location.href = "/"; </script>';
    return;
}

foreach ($rooms as $room) {
    # show all room ids
    echo $room['id'] . '<br>';
}
?>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>