<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo '../images/room_' . $roomId . '.jfif'; ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $roomName ?>
        </h5>
        <p class="card-text">
            <?php echo $roomDescription ?>
        </p>
        <p class="card-text">
            <?php echo 'Gasten: ' . $amountOfGuests ?>
        </p>
        <p class="card-text">
            <?php echo 'Prijs per nacht: €' . $roomPricePerNight ?>
        </p>
        <p class="card-text">
            <?php echo 'Totale prijs: €' . $totalPrice ?>
        </p>
        <p class="card-text">
            <?php echo 'Van ' . $beginDate . ' tot ' . $endDate ?>
        </p>
    </div>
</div>