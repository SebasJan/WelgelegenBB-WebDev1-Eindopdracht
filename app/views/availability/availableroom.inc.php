<div class="card available-room-card" style="width: 20rem;">
    <img class="card-img-top" src="<?='../images/room_' . $roomId . '.png'; ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">
            <?= $roomName ?>
        </h5>
        <p class="card-text">
            <?= $roomDescription ?>
        </p>
        <p class="card-text">
            <?='Prijs per nacht: €' . $roomPricePerNight ?>
        </p>
        <p class="card-text">
            <?='Totale prijs: €' . $totalPrice ?>
        </p>
    </div>
    <div class="card-footer">
        <a href=<?= $uri ?> class="btn btn-primary" style="background-color: #cf8e80; border: none;">Boek nu</a>
    </div>
</div>