<div class="card available-room-card" style="width: 20rem;">
    <img class="card-img-top" src="<?php echo '../images/room_' . $roomId . '.png'; ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $roomName ?>
        </h5>
        <p class="card-text">
            <?php echo $roomDescription ?>
        </p>
        <p class="card-text">
            <?php echo 'Prijs per nacht: €' . $roomPricePerNight ?>
        </p>
        <p class="card-text">
            <?php echo 'Totale prijs: €' . $totalPrice ?>
        </p>
    </div>
    <div class="card-footer">
        <a href=<?php echo $uri ?> class="btn btn-primary" style="background-color: #cf8e80; border: none;">Boek nu</a>
    </div>
</div>