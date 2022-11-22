<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container room">
    <div class="row">
        <h1>Beschikbare kamers</h1>
        <?php
        # loop through all rooms
        foreach ($model as $room) {
            $roomId = $room['id'];
            $roomName = $room['room_name'];
            $roomDescription = $room['description'];
            $roomPricePerAdultPerNight = $room['price_per_adult_per_night'];
            $roomPricePerChildPerNight = $room['price_per_child_per_night'];
            $amountOfGuests = $_GET['amountOfGuests'];
            $amountOfGuestsChilderen = $_GET['amountOfGuestsChilderen'];

            # calculate total price per night
            $roomPricePerNight = $roomPricePerAdultPerNight * $amountOfGuests + $roomPricePerChildPerNight * $amountOfGuestsChilderen;

            $uri = '?roomid=' . $roomId . '&amountOfGuests=' . $amountOfGuests . '&amountOfGuestsChilderen=' . $amountOfGuestsChilderen;
            # load the html from a file
            $room = require('../views/availability/availableroom.inc.php');
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>