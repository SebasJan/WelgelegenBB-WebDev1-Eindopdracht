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
            $roomPricePerAdultPerNight = $model['price_per_adult_per_night'];
            $roomPricePerChildPerNight = $model['price_per_child_per_night'];
            $amountOfGuests = $_GET['amountOfGuests'];
            $amountOfGuestsChilderen = $_GET['amountOfGuestsChilderen'];

            # calculate total price per night
            $roomPricePerNight = $roomPricePerAdultPerNight * $amountOfGuests + $roomPricePerChildPerNight * $amountOfGuestsChilderen;

            require('../views/reservation/room.inc.php');
            ?>
        </div>
        <?php
        require('../views/reservation/reservationform.inc.php');
        ?>
    </div>
</div>




<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>