<?php
# check for post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

?>

<div class="booking_search_form">
    <form action="" method="post">
        <input type="text" name="amount_of_guests" placeholder="Amount of adults" />
        <input type="text" name="amount_of_guests" placeholder="Amount of childeren" />
        <input type="date" name="begin_date" placeholder="From" />
        <input type="date" name="end_date" placeholder="Until" />
        <input type="submit" value="Zoeken" />
    </form>
</div>