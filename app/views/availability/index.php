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
            $roomPricePerNight = $room['price_per_night'];
            $amountOfGuests = $_GET['amountOfGuests'];

            # calculate total price per night
            $roomPricePerNight = $roomPricePerNight * $amountOfGuests;

            # build the uri for when the user wants to book
            $uri = '/reservation/?roomid=' . $roomId . '&amountOfGuests=' . $amountOfGuests;

            # load the html from a file
            $room = require('../views/availability/availableroom.inc.php');
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>