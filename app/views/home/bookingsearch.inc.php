<?php
# check for post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # sanitize input             
    $amountOfGuests = htmlspecialchars($_POST['amount_of_guests']);
    $amountOfGuestsChilderen = htmlspecialchars($_POST['amount_of_guests_childeren']);
    $beginDate = htmlspecialchars($_POST['begin_date']);
    $endDate = htmlspecialchars($_POST['end_date']);

    $results = $bookingRepository->checkAvailibleRooms($amountOfGuests, $amountOfGuestsChilderen, $beginDate, $endDate);
}

?>

<div class="booking_search_form">
    <form action="" method="post">
        <input type="text" name="amount_of_guests" placeholder="Amount of adults" />
        <input type="text" name="amount_of_guests_childeren" placeholder="Amount of childeren" />
        <input type="date" name="begin_date" placeholder="From" />
        <input type="date" name="end_date" placeholder="Until" />
        <input type="submit" value="Zoeken" />
    </form>
</div>