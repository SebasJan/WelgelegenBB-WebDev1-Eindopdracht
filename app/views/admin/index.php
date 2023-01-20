<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container margin-top-bottom">
    <h2>Overzicht aankomende boekingen</h2>
    <div class="table-responsive">
        <table class="table table-striped bookings-table">
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
                    require '../views/admin/bookingrow.inc.php';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal to update booking information -->
    <div id="updateBookingModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close">&times;</span>
            <h2>Update Booking Details</h2>
            <form>
                <label for="amountofvisitors">Amount of Visitors:</label><br>
                <input type="number" id="amountofvisitors" name="amountofvisitors"><br>
                <label for="checkin">Check-In Date:</label><br>
                <input type="date" id="checkin" name="checkin"><br>
                <label for="checkout">Check-Out Date:</label><br>
                <input type="date" id="checkout" name="checkout"><br>
                <label for="price">Total Price:</label><br>
                <input type="number" id="price" name="totalprice"><br>
            </form>
            <button id="updateBookingButton" class="btn btn-primary" onclick="updateBooking(this.id)">Update
                Booking</button>
        </div>
    </div>
</div>

<script src="../js/admin.js"></script>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>