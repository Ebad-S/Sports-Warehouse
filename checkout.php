<?php

// Common includes for the main PHP pages (controllers)
require_once "includes/common.php";

// Config
$title = "CheckOut ";

// check i the form has been submitted
if (isset($_POST["submitcheckout"])) {
    //form has been submited - process form DATA

    //get DATA passed to this page (in the $_POST super global array)
    $firstName = trim($_POST["firstName"] ?? "");
    $lastName = trim($_POST["lastName"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $deliveryAddress = trim($_POST["deliveryAddress"] ?? "");
    $contactNumber = trim($_POST["contactNumber"] ?? "");
    $payment = trim($_POST["payment"] ?? "");
    $creditCardNumber = trim($_POST["creditCardNumber"] ?? "");
    $expiryDate = trim($_POST["expiryDate"] ?? "");
    $NameOnCC = trim($_POST["NameOnCC"] ?? "");



    // Collection of all errors for this form (empty by default)
    $errors = [];


    // TODO: Validate the DATA 

    //validate first name (2+ characters)
    if (strlen($firstName) < 2) {
        $errors["firstName"] = "First name Must be 2+ characters";
    }


    //check for invalid DATA(errors)
    if(!empty($errors)){
        // if(count($errors) > 0) { }

        echo "errors!";

        // Invalid: Display the registration form with error messages

        // Include the confirmation templete using the output buffering
        ob_start();
        include_once "templates/_checkOutForm.html.php";
        $output = ob_get_clean();
        
    } else {
        echo "no errors!";
        // Valid: Display registration confirmation

        $currentCart = $_SESSION["cart"];

        // run the saveCart function on the shopping cart
        echo '<pre>' . var_export($currentCart, true) . '</pre>';
        
        // TODO: put them  1 line down 
        // $address, $contactNumber, $creditCardNumber, $csv, $email, $expiryDate, $firstName, $lastName, $nameOnCard
        $orderId = $currentCart->saveCart(
            
        );

        //include the template using the output buffring
        ob_start();
        include_once "templates/_checkOutConfirmation.html.php";
        $output = ob_get_clean();
        
    }

} else {

// Form has not been sbmited(first load of the page) - just show the form 

//step 0. start output buffering (capture output, dont display it yet)
ob_start();

// 1. Include the tegistration form templete
include_once "templates/_checkOutForm.html.php";

// Stop output buffering - store output in the $output variable
$output = ob_get_clean();

}


// 2. Include  the layout template (and inject content)  
include_once "templates/_layout.html.php";