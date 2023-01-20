<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container margin-top-bottom">
    <div class="room d-flex justify-content-center row">
        <h1>Beschikbare kamers</h1>
        <?php
        # loop through all rooms
        foreach ($rooms as $room) {
            # get the data from the room to pass in the u
            $roomId = $room['id'];
            $roomName = $room['room_name'];
            $roomDescription = $room['description'];
            $roomPricePerNight = $room['price_per_night'];
            $amountOfNights = (strtotime($endDate) - strtotime($beginDate)) / (60 * 60 * 24);

            # calculate total price per night and total price            
            $totalPrice = $roomPricePerNight * $amountOfNights;

            # build the uri for when the user wants to book
            $uri = '/reservation/?roomid=' . $roomId . '&amountOfGuests=' . htmlspecialchars($_GET['amountOfGuests']) . '&totalPrice='
                . $totalPrice . '&beginDate=' . htmlspecialchars($_GET['beginDate']) . '&endDate=' . htmlspecialchars($_GET['endDate']);

            # load the html from a file
            $room = require('../views/availability/availableroom.inc.php');
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>