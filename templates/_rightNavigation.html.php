<?php

// Navigation items as an array
$navigationLinks = [
    "logout.php" => "Logout",
    "login.php" => "Login",
    "cart.php" => "ViewCart",
    "manageUser.php" => "Manage",
];

// Get the currently loaded PHP page/script, e.g., index.php
$currentPage = basename($_SERVER["SCRIPT_NAME"]);

// Determine which navigation links to display based on the user session
$userSession = $_SESSION["userSession"] ?? "";

$userSessionLinks = [];
if ($userSession === "loggedIn") {
    // User is logged in, display "Logout" and "Manage"
    $userSessionLinks = ["logout.php", "manageUser.php"];
} else {
    // User is not logged in, display "Login"
    $userSessionLinks = ["login.php"];
}

?>
<!-- Loop starts here -->
<?php foreach ($navigationLinks as $linkHref => $linkText) : ?>
    <?php if (in_array($linkHref, $userSessionLinks)) : ?>
        <li class="nav-item <?= $currentPage === $linkHref ? "nav-item--active" : "" ?>">
            <img class="cart" src="./assets/<?= $linkText ?>.png" alt="<?= $linkText ?>" />
            <a class="nav-link" href="<?= $linkHref ?>"><?= $linkText ?></a>
        </li>
    <?php endif; ?>
<?php endforeach ?>
<!-- Loop ends here -->
