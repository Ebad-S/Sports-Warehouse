<div class="login-message">
    <h2>Welcome Back!</h2>
    <p>Enter your credentials to unlock the secret managing powers</P>
    <p>We're glad to see you again!</p>
</div>

<?php include "_error.html.php" ?>
<?php include "_success.html.php" ?>

<form class="contact" action="login.php" method="post" novalidate>
    <fieldset>
    <legend class="legend-name">Login</legend>
        <div class="form-row">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= setValue("username") ?>" required>
        </div>

        <div class="form-row">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?= setValue("password") ?>" required>
        </div>

        <div class="form-row">
            <button class="anybtn" type="submit" name="submitLogin">Login</button>
        </div>
    </fieldset>
</form>