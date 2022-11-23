<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container">
    <h1>Welkom {Beheerder}. Hier kunt u inloggen</h1>
    <form action="/admin/validateLogin" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="textr" id="form2Example1" class="form-control" name="username" />
            <label class="form-label" for="form2Example1">Gebruikersnaam</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        <!-- Submit button -->
        <button class="btn btn-primary btn-block mb-4">Login</button>
    </form>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>