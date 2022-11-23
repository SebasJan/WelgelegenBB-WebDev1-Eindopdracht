<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Gekozen kamer:</h2>
            <?php
            $roomId = $_GET['roomid'];
            $roomName = $model['room_name'];
            $roomDescription = $model['description'];
            $roomPricePerNight = $model['price_per_night'];
            $amountOfGuests = $_GET['amountOfGuests'];
            $totalPrice = $_GET['totalPrice'];
            $beginDate = $_GET['beginDate'];
            $endDate = $_GET['endDate'];

            # create room and booking objects
            require_once __DIR__ . '/../../models/room.php';
            require_once __DIR__ . '/../../models/booking.php';
            $room = new Room($roomId, $roomName, $amountOfGuests, $roomDescription, $roomPricePerNight);
            $_SESSION['booking'] = new Booking($room, $amountOfGuests, $beginDate, $endDate, $totalPrice);

            # calculate the amount of nights and the price per night
            $amountOfNights = (strtotime($endDate) - strtotime($beginDate)) / (60 * 60 * 24);
            $roomPricePerNight = $roomPricePerNight * $amountOfGuests;

            require('../views/reservation/room.inc.php');
            ?>
        </div>
        <?php
        require('../views/reservation/reservationform.inc.php');
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>