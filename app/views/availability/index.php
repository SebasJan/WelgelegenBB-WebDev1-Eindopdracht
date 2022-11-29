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
            $beginDate = $_GET['beginDate'];
            $endDate = $_GET['endDate'];
            $amountOfNights = (strtotime($endDate) - strtotime($beginDate)) / (60 * 60 * 24);

            # calculate total price per night and total price            
            $totalPrice = $roomPricePerNight * $amountOfNights;

            # build the uri for when the user wants to book
            $uri = '/reservation/?roomid=' . $roomId . '&amountOfGuests=' . $amountOfGuests . '&totalPrice=' . $totalPrice . '&beginDate=' . $beginDate . '&endDate=' . $endDate;

            # load the html from a file
            $room = require('../views/availability/availableroom.inc.php');
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>