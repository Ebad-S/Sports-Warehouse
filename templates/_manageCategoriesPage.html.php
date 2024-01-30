<?php

// Include references (form helper functions)
require_once ROOT_DIR . "includes/form.php";

// Build category object
$category = new Category();

?><h2 class="subhead">Manage categories</h2>

<?php include "_formErrorSummary.html.php" ?>

<p>
    <a class="anybtn" href="manageCategories.php?action=add">➕ Add New Category</a>
</p>
<br>

<?php if ($category->getNumberOfCategories() === 0) : ?>

    <p>No categories to display, please add one.</p>

<?php else : ?>
<div class="cat-table">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($category->getCategories() as $item) : ?>
            <tr>
                <td><?= $item["categoryId"] ?></td>
                <td><?= $item["categoryName"] ?></td>
                <th>
                    <!-- <a href="manageCategories.php?action=edit&id=xxx">Edit</a> -->
                    <form action="manageCategories.php" method="get">
                        <input type="hidden" name="categoryId" value="<?= $item["categoryId"] ?>">
                        <button class="smallbtn" type="submit" name="action" value="edit">Edit</button>
                        <button class="smallbtn" type="submit" name="action" value="delete">Delete</button>
                    </form>
                </th>
            </tr>
        <?php endforeach ?>
    </table>

    <p><strong>Total categories: <?= $category->getNumberOfCategories() ?></strong></p>
    </div>
<?php endif ?>