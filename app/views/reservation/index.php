<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Gekozen kamer:</h2>
            <?php
            $roomId = $_GET['roomid'];
            $amountOfGuests = $_GET['amountOfGuests'];
            $totalPrice = $_GET['totalPrice'];
            $beginDate = $_GET['beginDate'];
            $endDate = $_GET['endDate'];

            # create room and booking objects
            require_once __DIR__ . '/../../models/room.php';
            require_once __DIR__ . '/../../models/booking.php';

            # get the room from the model givin by the controller           
            $_SESSION['booking'] = new Booking($room, $amountOfGuests, $beginDate, $endDate, $totalPrice);

            # calculate the amount of nights and the price per night
            $amountOfNights = (strtotime($endDate) - strtotime($beginDate)) / (60 * 60 * 24);

            require('../views/reservation/room.inc.php');
            ?>
        </div>
        <?php
        require('../views/reservation/reservationform.inc.php');
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>