<h2 class="subhead">Create new user</h2>

<?php include "_error.html.php" ?>
<?php include "_success.html.php" ?>

<form action="createUser.php" method="post" novalidate>
    <fieldset>
        <legend class="legend-name">Create New User</legend>
        <div class="form-row">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= setValue("username") ?>" required>
        </div>

        <div class="form-row">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?= setValue("password") ?>" required>
        </div>

        <div class="form-row">
            <button class="protected-item-btn" type="submit" name="submitCreateUser">Create New User</button>
        </div>
    </fieldset>
</form>