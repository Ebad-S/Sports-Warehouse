<?php

// Set the user session in the session variable (initialize as an empty string or set dynamically)
$_SESSION["userSession"] = "";

// Retrieve the chosen user session from the session or default to "default" if not set
$userSession = $_SESSION["userSession"] ?? "default";

// var_dump($_SESSION);
// exit;


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Undifined Document" ?> - sportswarehouse</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="page-<?= basename($_SERVER["SCRIPT_NAME"], ".php") ?> userSession-<?= $userSession ?>">
    <div class="site-wrapper "> 
        <header class="site-header">
            <div class="menu">
                <div class="burger-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <nav class="navbar wrapper">
                    <div class="navseperator">
                        <?php include "_navigation.html.php"; ?>
                        <div>
                            <ul class="nav-menu-right">
                                <?php include "_rightNavigation.html.php"; ?>
                                <li class="nav-item">
                                    <?php
                                    // Get number of items in cart if the session variable is set
                                    $num_items = isset($_SESSION["cart"]) ? $_SESSION["cart"]->counter() : 0; 
                                    ?>
                                    <button class="itemholder"><?= $num_items ?> items</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="main-content wrapper">
            <div class="search-logo-container">
                <div class="logo">
                    <a href="index.php"><img src="./assets/sports-warehouse-logo-600.png" width="600" height="82" alt="sports-warehouse-logo" /></a>
                </div>

                <form class="search" action="search.php" method="get">
                    <input class="search__input" type="search" name="search" aria-label="Product Search" placeholder="Search  producs ">
                    <button type="submit" class="search__submit"><img src="assets/search-icon.png" alt="search-icon"></button>
                </form>
            </div>
            <?php include "_navigationProducts.html.php" ?>
            <?= $output ?? 'NO TEMPLATE CONTENT - $output not defined' ?>
        </main>
    </div>
    <br>
    <footer class="footerbg">
        <?php include "_navigationFooter.html.php" ?>
    </footer>
    <span class="copyright">
        &copy;Copyright 2020 Sports Warehouse. All rights reserved. Website made (not really) by Awesomesauce Design.
    </span>
    
    <!-- <script src="script/script.js"></script>  -->
    <script src="./script/burgerMenu.js"></script>
    <!-- chatbot -->
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/acc7a83b-0f1a-4216-afa3-61d57b5b7f4e/webchat/config.js" defer></script>
</body>

</html>