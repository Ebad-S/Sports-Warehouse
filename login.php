<?php

// References
require_once "includes/common.php";
require_once "classes/Auth.php";

// Check if the user is already logged in, redirect to protected/success page
if (Auth::isLoggedIn()) {
    // Redirect the user to the success/protected page (skip login)
    header("Location: " . Auth::SUCCESS_PAGE_URL);
    exit;
}

// Config
$title = "Login";

// Start output buffering (trap output, don't display it yet)
ob_start();

if (isset($_POST["submitLogin"])) {
    // Get data passed to this page
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Check if either username or password NOT supplied
    if ($username === "" || $password === "") {
        // Set error message
        $errorMessage = "Username and password are required";
        // Re-display the form with errors
        include_once "./templates/_loginPage.html.php";
    } else {
        try {
            // Authenticate the user
            // NOTE: user will be redirected on success!
            Auth::login($username, $password);

            // If we reach here the login was successful
            // Set the user session to "loggedIn"
            $_SESSION["userSession"] = "loggedIn";

            // Redirect to the home page or wherever appropriate
            header("Location: index.php");
            exit();
        } catch (Exception $ex) {
            $errorMessage = "Error Logging in: " . $ex->getMessage();
        }

        // Re-display login user form with messages
        include_once "./templates/_loginPage.html.php";
    }
} else {
    // Display login user form
    include_once "./templates/_loginPage.html.php";
}

// Output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

/**
 * Set an HTML-safe value of a form field from $_POST data.
 * @param string $fieldName The name of the field to display.
 * @return string The HTML entity encoded output for the form field.
 */
function setValue($fieldName)
{
    return htmlspecialchars($_POST[$fieldName] ?? "");
}
