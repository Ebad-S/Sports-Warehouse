<?php

// Dependencies
require_once ROOT_DIR . "classes/DBAccess.php";

// Check if website is running locally (e.g. localhost/127.0.0.1/::1)
if (
    $_SERVER["SERVER_NAME"] === "localhost" ||  // hostname
    $_SERVER["SERVER_ADDR"] === "127.0.0.1" ||  // IPv4
    $_SERVER["SERVER_ADDR"] === "::1"           // IPv6
) {

    // Database config - local
    $dbServer = "localhost";
    $dbDatabase = "sportswh_deliv_d";
    $dbUsername = "root";
    $dbPassword = "";
} else {

    // Database config - remote
    $dbServer = "localhost";
    $dbDatabase = "magenta08_wp";
    $dbUsername = "magenta08";
    $dbPassword = "40people59!";
}

// Create a DBAccess instance (this is used for ALL database operations)
$db = new DBAccess($dbServer, $dbDatabase, $dbUsername, $dbPassword);
