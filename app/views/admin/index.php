<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container">
    <h2>Overzicht aankomende boekingen</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Begin datum</th>
                <th scope="col">Eind datum</th>
                <th scope="col">Kamer</th>
                <th scope="col">Naam klant</th>
                <th scope="col">Aantal gasten</th>
                <th scope="col">Prijs</th>
                <th scope="col">Verwijderen</th>
                <th scope="col">Aanpassen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($bookings as $booking) {
                echo '<tr>';
                echo '<td>' . $booking->checkInDate . '</td>';
                echo '<td>' . $booking->checkOutDate . '</td>';
                echo '<td>' . $booking->room->name . '</td>';
                echo '<td>' . $booking->customer->firstName . ' ' . $booking->customer->lastName . '</td>';
                echo '<td>' . $booking->amountOfVisitors . '</td>';
                echo '<td>' . '€' . $booking->price . '</td>';
                # buttons to delete and update a booking, and send the id when clicked
                echo '<td>
                            <a id="' . $booking->id . '" onClick="updateButtonClicked(this.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#cf8e80" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </td>';
                echo '<td>
                            <a id="' . $booking->id . '" onClick="deleteButtonClicked(this.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#cf8e80" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<script src="../js/admin.js"></script>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>