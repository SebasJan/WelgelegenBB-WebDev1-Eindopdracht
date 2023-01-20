<div class="card">
    <img class="card-img-top" src="<?='../images/room_' . $roomId . '.png'; ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">
            <?= $room->name ?>
        </h5>
        <p class="card-text">
            <?= $room->description ?>
        </p>
        <p class="card-text">
            <?='Gasten: ' . $amountOfGuests ?>
        </p>
        <p class="card-text">
            <?='Prijs per nacht: €' . $room->pricePerNight ?>
        </p>
        <p class="card-text">
            <?='Totale prijs: €' . $totalPrice ?>
        </p>
        <p class="card-text">
            <?='Van ' . $beginDate . ' tot ' . $endDate ?>
        </p>
    </div>
</div>