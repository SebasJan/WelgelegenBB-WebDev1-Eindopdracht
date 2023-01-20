<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>
<div class="container margin-top-bottom">
    <div class="row">
        <div class="col-sm-4">
            <h2>Gekozen kamer:</h2>
            <?php
            $roomId = htmlspecialchars($_GET['roomid']);
            $amountOfGuests = htmlspecialchars($_GET['amountOfGuests']);
            $totalPrice = htmlspecialchars($_GET['totalPrice']);
            $beginDate = htmlspecialchars($_GET['beginDate']);
            $endDate = htmlspecialchars($_GET['endDate']);

            # create room and booking objects
            require_once __DIR__ . '/../../models/room.php';
            require_once __DIR__ . '/../../models/booking.php';

            # get the room from the model givin by the controller           
            $_SESSION['booking'] = new Booking($room, $amountOfGuests, $beginDate, $endDate, $totalPrice);

            # calculate the amount of nights and the price per night
            $amountOfNights = (strtotime($endDate) - strtotime($beginDate)) / (60 * 60 * 24);

            require_once('../views/reservation/room.inc.php');
            ?>
        </div>
        <?php
        require_once('../views/reservation/reservationform.inc.php');
        ?>
    </div>
</div>

<!-- add script.js -->
<script src="../js/reservation.js"></script>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>