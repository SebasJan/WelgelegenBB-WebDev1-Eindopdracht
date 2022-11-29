<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<!-- overview with dates and bookings -->
<!-- create a container with a table -->
<div class="container">
    <h2>Overzicht boekingen</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Begin datum</th>
                <th scope="col">Eind datum</th>
                <th scope="col">Kamer</th>
                <th scope="col">Naam klant</th>
                <th scope="col">Aantal gasten</th>
                <th scope="col">Prijs</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($model as $booking) {
                echo '<tr>';
                echo '<td>' . $booking->checkInDate . '</td>';
                echo '<td>' . $booking->checkOutDate . '</td>';
                echo '<td>' . $booking->room->name . '</td>';
                echo '<td>' . $booking->customer->firstName . ' ' . $booking->customer->lastName . '</td>';
                echo '<td>' . $booking->amountOfVisitors . '</td>';
                echo '<td>' . '€' . $booking->price . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- option to change bookings -->
<!-- option to make booking -->
<!-- option to contact customers -->

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>