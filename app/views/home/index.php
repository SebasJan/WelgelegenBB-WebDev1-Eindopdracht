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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et
                dolore magna
                aliqua. Elementum sagittis vitae et leo duis ut diam quam nulla. Tincidunt dui ut ornare lectus sit amet
                est placerat
                in. Amet nulla facilisi morbi tempus iaculis urna id volutpat lacus. Curabitur gravida arcu ac tortor
                dignissim
                convallis aenean et. Viverra vitae congue eu consequat. Sit amet justo donec enim. Tempor nec feugiat
                nisl pretium fusce
                id velit. Ut pharetra sit amet aliquam id diam maecenas. Aliquam eleifend mi in nulla posuere
                sollicitudin aliquam
                ultrices sagittis. Scelerisque eu ultrices vitae auctor eu augue ut lectus arcu. Urna condimentum mattis
                pellentesque id
                nibh tortor. Neque volutpat ac tincidunt vitae. Et ligula ullamcorper malesuada proin libero nunc
                consequat interdum. Ut
                lectus arcu bibendum at varius. Scelerisque in dictum non consectetur a erat nam at lectus. Maecenas
                pharetra convallis
                posuere morbi leo urna molestie at. Gravida neque convallis a cras semper auctor.</p>
        </div>
        <div class="col-sm">
            <img id="breakfast_in_room" src="../images/breakfast.jpg" alt="ontbijt_in_kamer">
        </div>
    </div>
</div>

<hr class="mt-2 mb-2">

<!-- check date source:https://colorlib.com/wp/template/colorlib-booking-3/ -->
<!--  -->
<div id="booking" class="section">
    <div class="section-center">
        <div class="container-fluid">
            <div class="row">
                <div class="booking-form">
                    <form action="/home/getAvailableRooms" method="post">
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
                                            <input class="form-control" type="date" name="check_in_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Check out</span>
                                            <input class="form-control" type="date" name="check_out_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="form-label">Gasten</span>
                                            <select class="form-control" name="amount_of_guests" required>
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
                                    <button class="submit-btn">Controleer beschikbaarheid</button>
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
            <img class="d-block w-100" src="../images/1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>My Caption Title (1st Image)</h5>
                <p>The whole caption will only show up if the screen is at least medium size.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/3.jpg" alt="Third slide">
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

<!-- js -->
<script>
    // get sumbite-btn by class
    const submitBtn = document.querySelector('.submit-btn');
    // event listener on submit button
    submitBtn.addEventListener('click', () => {
        console.log('submit button clicked');
    })
</script>


<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>