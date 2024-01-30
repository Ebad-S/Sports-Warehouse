<?php

//navigation items as an array 
$navigationLinks = [
  // "page.php" => "Nav text",
  "manageProducts.php" => " Manage Products",
  "manageCategories.php" => " Manage Categories",
  "manageUser.php" => " Manage User",
];

//get the curently loaded PHP page/ script, e.g. index.php
// print_r($_SERVER["SCRIPT_NAME"]); =get the currently loaded PHP script
// basename(path) gets the last section of the path (i.e. just the file name)
$currentPage = basename($_SERVER["SCRIPT_NAME"]);

?>

<h2 class="subhead">Admin Dashboard</h2>
<ul class="protected-nav">

  <?php foreach ($navigationLinks as $linkHref => $linkText) : ?>
    <li class="protected-item-btn <?= $currentPage === $linkHref ? "nav-item--active" : "" ?>">
      <a class="protected-link" href="<?= $linkHref ?>"><?= $linkText ?></a>
    </li>

  <?php endforeach ?>
</ul>

<!-- TODO: in right-nav change the Login to Logout! -->
<!-- TODO: for each button, add these functionalities: add, edit, remove -->