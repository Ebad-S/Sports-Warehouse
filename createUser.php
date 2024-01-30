<?php

//refereces
require_once "includes/common.php";
require_once "classes/Auth.php";

//protect this page against unathorised access (non-logged-in user)
//users will be redirected if they do NOT have valid data in the PHP session
Auth::protect();

// Config
$title = "Create User";

// Start output buffering (trap output, don't display it yet)
ob_start();

//check if the form has been submited 
if (isset($_POST["submitCreateUser"])) {

  //get data passed to this page 
  $username = trim($_POST["username"] ?? "");
  $password = $_POST["password"] ?? "";

  //check if either username or password NOT supplied
  if ($username === "" || $password === "") {

    //set error message
    $errorMessage = "username and password are required";

    //redisplay the form with errors
    include_once "./templates/_createUserPage.html.php";

    // both username and password supplied
  } else {


    try {
      //create new user 
      //Note: createUser() is a static method, so we use class::method(),not  $object -> method() 
      $newUserId =  Auth::createUser($username, $password);

      $successMessage = "New user added successfully, ID: " . $newUserId;
    } catch (Exception $e) {

      $errorMessage = "Error adding to new user: " . $ex->getMessage();
    }

    // re-Display create user form with messages
    include_once "./templates/_createUserPage.html.php";
  }
} else {

  // Display create user form
  include_once "./templates/_createUserPage.html.php";
}




// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";




/**
 * Set an HTML-safe value of a form field from $_POST data.
 * @param string $fieldName The name of field to display.
 * @return string The HTML entity encoded output for the form field.
 */
function setValue($fieldName)
{
  return htmlspecialchars($_POST[$fieldName] ?? "");
}
