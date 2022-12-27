<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container" style="border-radius: 10%; border: none; width: fit-content;">
    <h1>Log hier eerst in</h1>
    <form id="loginForm" action="/admin/validateLogin" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="textr" id="userName" class="form-control" name="username" />
            <label class="form-label" for="form2Example1">Gebruikersnaam</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4" id="loginButton">Login</button>
    </form>
</div>


<!-- add script.js -->
<script src="../js/login.js"></script>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>