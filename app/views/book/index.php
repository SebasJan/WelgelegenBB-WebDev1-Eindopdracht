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
?>
<h1>Beschikbare kamers</h1>
<h2>Data wijzigen?</h2>
<a href="/#booking" class="btn btn-primary">Terug</a>
<div class="container">
    <div class="container room">
        <!-- display room information here -->
        <?php
        # loop through all rooms
        foreach ($rooms as $room) {
            # load the availableroom.inc.php and pass the room object
            $room = file_get_contents('../views/book/availableroom.inc.php');

            # replace the placeholders with the actual values
            $room = str_replace('src', "../images/room_1.jfif", $room);
            $room = str_replace('title', 'test', $room);
            $room = str_replace('info', 'test', $room);
            echo $room;
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>