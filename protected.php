<?php

//refereces
require_once "includes/common.php";
require_once "classes/Auth.php";

//authenticate the user
Auth::protect();

// Config
$title = "Admin Dashboard";


// Start output buffering (trap output, don't display it yet)
ob_start();

// Include the page-specific template
include_once "./templates/_protectedPage.html.php";

// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";
