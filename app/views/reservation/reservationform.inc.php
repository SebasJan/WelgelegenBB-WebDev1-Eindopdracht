<div class="col-sm-7">
    <h2>Reserveren</h2>
    <p>U betaalt pas bij aankomst</p>
    <p>*: verplicht</p>
    <form action="/reservation/bookRoom" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">*Voornaam</label>
            <input type="text" class="form-control" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">*Achternaam</label>
            <input type="text" class="form-control" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">*Email</label>
            <input type="email" class="form-control" name="email" required>
            <small class="form-text text-muted">Zodat we de boeking naar u kunnen mailen.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Telefoon nummer</label>
            <input type="tel" class="form-control" name="phone_number">
            <small class="form-text text-muted">Zodat we u makkelijk kunnen bereiken</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">*Postcode</label>
            <input type="text" class="form-control" name="postal_code">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">*Huisnummer</label>
            <input type="text" class="form-control" name="house_number">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">*Straatnaam</label>
            <input type="text" class="form-control" name="streetname">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">*Woonplaats</label>
            <input type="text" class="form-control" name="residence">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1" required>Ik ga akkoord met de voorwaarden</label>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #cf8e80; border: none;"
            name="submit">Reserveer</button>
    </form>
</div>