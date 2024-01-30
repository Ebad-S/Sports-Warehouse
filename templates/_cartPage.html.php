<?php

// Include references (form helper functions)
require_once ROOT_DIR . "includes/form.php";

?><h2 class="subhead">Shopping Cart</h2>


<?php include "_formErrorSummary.html.php" ?>

<?php if ($cart->count() === 0) : ?>

    <p class="nutral-message">Your shopping cart is empty, you should <a class="link-blue" href="index.php">browse for something to
            buy</a>!</p>

    <!-- password hasher -->
    <!-- <?php
            echo hash('sha256', 'password2');
            ?> -->

<?php else : ?>

    <table class="shoppingcart">
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th></th>
        </tr>
        <?php foreach ($cart->getItems() as $item) : ?>
            <tr>
                <td><?= $item->getItemName() ?></td>
                <td><?= sprintf('$%1.2f', $item->getPrice()) ?></td>

                <td><?= $item->getQuantity() ?></td>
                <th>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="itemId" value="<?= $item->getItemId() ?>">
                        <button class="smallbtn" type="submitbtn" name="submitRemoveFromCart">Remove</button>
                    </form>
                </th>
            </tr>
        <?php endforeach ?>
    </table>

    <p style="align-items: right"><strong>Cart total: <?= sprintf('$%1.2f', $cart->calculateTotal()) ?></strong></p>

    <a href="checkout.php">
        <button class="smallbtn">checkout</button>
    </a>


<?php endif ?>