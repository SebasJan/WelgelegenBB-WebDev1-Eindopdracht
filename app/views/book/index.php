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
<div class="container room">
    <div class="row">
        <h1>Beschikbare kamers</h1>
        <!-- display room information here -->
        <?php
        # loop through all rooms
        foreach ($rooms as $room) {
            $roomId = $room['id'];
            $roomName = $room['room_name'];
            $roomDescription = $room['description'];
            $roomPricePerAdultPerNight = $room['price_per_adult_per_night'];
            $roomPricePerChildPerNight = $room['price_per_child_per_night'];
            $roomPricePerNight = $roomPricePerAdultPerNight * $amountOfGuests + $roomPricePerChildPerNight * $amountOfGuestsChilderen;

            # load the availableroom.inc.php and pass the room object
            $room = file_get_contents('../views/book/availableroom.inc.php');

            # replace the placeholders with the actual values
            $room = str_replace('{title}', $roomName, $room);
            $room = str_replace('{description}', $roomDescription, $room);
            $room = str_replace('{img}', '../images/room_' . $roomId . '.jfif', $room);
            $room = str_replace('{href}', '', $room);
            $room = str_replace('{price}', $roomPricePerNight, $room);

            echo $room;
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>