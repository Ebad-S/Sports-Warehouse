<?php

//include reference (form helmer functions)
require_once ROOT_DIR . "includes/form.php";
?>

<?php include "_formErrorSummary.html.php" ?>

<!-- TODO: turn the nonvalidate off for the production time  -->
<form class="contact" action="contactUs.php" method="post" novalidate>
        <fieldset>
            <legend class="legend-name">Contact Us</legend>
            <div class="form-row">
                <label for="firstName">First name:</label>
                <input type="text" name="firstName" id="firstName" required autofocus <?= setValue("firstName")?>>
            </div>
            <div class="form-row">
                <label for="lastName">Last name:</label>
                <input type="text" name="lastName" id="lastName" required <?= setValue("lastName")?>>
            </div>
            <div class="form-row">
                <label for="phoneNo">Phone:</label>
                <input type="tel" name="phoneNo" id="phoneNo" required <?= setValue("phoneNo")?>>
            </div>
            <div class="form-row">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required <?= setValue("email")?>>
            </div>


            <div class="form-row">
                <label for="comments">Message:</label>
                <textarea name="comments" id="comments" cols="30" rows="4"><?= setTextbox("comments")?></textarea>
            </div>

            <div class="form-row">
                <button class="submitbtn" type="submit" name="submitRegister">Submit</button>
            </div>
        </fieldset>
    </form>