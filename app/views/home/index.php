<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<!-- hero -->
<div class="p-5 text-center bg-image rounded-3 hero">
    <div class="mask">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">Welgelegen</h1>
                <h4 class="mb-3">Een plek om echt even tot rust te komen</h4>
                <a id="hero_button" href="#booking" role="button">Boek nu</a>
            </div>
        </div>
    </div>
</div>

<hr class="mt-2 mb-2">

<!-- information -->
<div class="container information">
    <div class="row">
        <div class="col-sm information_text">
            <h2>Welkom op onze boerderij</h2>
            <p>
                Bij B&B Welgelegen willen we u een speciaal gevoel geven en u de beste ervaring ooit bezorgen. Of u nu
                een ontbijt,
                lunch, diner of weekendverblijf plant, wij bieden de heerlijkste ontbijt-, brunch- en wijnervaringen in
                de omgeving.
                Beleef het leven met ons!
            </p>
            <p>

                Kom voor een glas rode wijn en neem een pauze en ontbijt op het terras met uw favoriete Europese
                gerechten of maak u
                klaar voor wat familieplezier bij ons in de kinderclub! Laat ons u verwennen met de ongelooflijke
                gastvrijheid van deze
                schilderachtige boerderij. U verblijft in een van de 3 ruime cottages met drie tot vier slaapkamers en u
                kunt kiezen uit
                een snack voor het slapen gaan, een snoepje of een heerlijk ontbijt.
            </p>
            <p>
                Gastvrijheid op zijn best!
            </p>
            <p>
                Fijn verblijf bij ons in B&B Welgelegen!
            </p>
        </div>
        <div class="col-sm">
            <img id="impression" src="../images/impression.png" alt="ontbijt_in_kamer">
        </div>
    </div>
</div>

<hr class="mt-2 mb-2">

<!-- date source:https://colorlib.com/wp/template/colorlib-booking-3/ -->
<!--  -->
<div id="booking" class="section">
    <div class="section-center">
        <div class="container-fluid">
            <div class="row">
                <div class="booking-form">
                    <form id="booking_form" action="/home/getAvailableRooms" method="post">
                        <div class="row no-margin">
                            <div class="col-md-2">
                                <div class="form-header">
                                    <h2>Boek nu</h2>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row no-margin">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Check In</span>
                                            <input class="form-control" id="check_in" type="date" name="check_in_date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Check out</span>
                                            <input class="form-control" id="check_out" type="date" name="check_out_date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="form-label">Gasten</span>
                                            <select id="amount_of_guests" class="form-control" name="amount_of_guests"
                                                required>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-btn">
                                    <button type="button" class="submit-btn">Controleer beschikbaarheid</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="mt-2 mb-2">

<!-- carousel for pictures of B&B -->
<h2 class="text-center">Impressie van onze kamers</h2>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/impression_1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Onze pareltjes</h5>
                <p>Alle kamers hebben een eigen badkamer en een gegarandeerd geweldig uitzicht ;)</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/impression_2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/impression_3.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- add script.js -->
<script src="../js/home.js"></script>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>