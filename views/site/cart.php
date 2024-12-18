<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Cart';
?>

<!-- Loader Start -->
<?= $this->render('components/common/_loader') ?>

<!-- Loader End -->

<!-- Header Start -->
<?= $this->render('components/common/_header') ?>

<!-- Header End -->

<!-- mobile fix menu start -->
<?= $this->render('components/common/_mobile-fix') ?>

<!-- mobile fix menu end -->

<!-- Breadcrumb Section Start -->
<?= $this->render('components/common/_breadcrumb') ?>

<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-9">
                <div class="cart-table">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <tbody>
                                <?php
                                $cartSubtotal = 0; // Initialize subtotal
                                ?>

                                <?php if (!empty($dataProvider->getModels())): ?>
                                    <?php foreach ($dataProvider->getModels() as $index => $row):
                                        $productPrice = $row->product->selling_price;
                                        $productQuantity = $row->quantity;
                                        $rowSubtotal = $productPrice * $productQuantity;
                                        $cartSubtotal += $rowSubtotal;
                                    ?>
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="<?= Url::to(['/site/product-view', 'id' => $row->product_id]) ?>" class="product-image">
                                                        <img src="/web/uploads/<?= $row->product->thumbnail ?>"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name">
                                                                <a href="<?= Url::to(['/site/product-view', 'id' => $row->product_id]) ?>"><?= $row->product->name ?></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <h4 class="table-title text-content">Price</h4>
                                                <h5>Ksh. <?= number_format($row->product->selling_price) ?></h5>
                                            </td>
                                            <td class="quantity">
                                                <h4 class="table-title text-content">Qty</h4>
                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            <input type="hidden" class="cart-id" value="<?= $row->id ?>" />
                                                            <button type="button" class="btn " onclick="updateQuantity(this, -1)">
                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input"
                                                                type="number"
                                                                min="1"
                                                                value="<?= $row->quantity ?>"
                                                                readonly /> <!-- Set readonly attribute here -->
                                                            <button type="button" class="btn " onclick="updateQuantity(this, 1)">
                                                                <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>



                                            <td class="subtotal">
                                                <h4 class="table-title text-content">Total</h4>
                                                <h5>Ksh. <?= number_format($row->product->selling_price * $row->quantity) ?></h5>
                                            </td>
                                            <!-- <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="remove close_button" href="<?= Url::to(['cart-product/remove-product', 'cartId' => $row->id]) ?>">Remove</a>
                                            </td> -->

                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <button class="remove" data-cart-id="<?= $row->id ?>">Remove</button>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h4>Your cart is empty!</h4>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3">
                <div class="summery-box p-sticky">
                    <div class="summery-header">
                        <h3>Cart Total</h3>
                    </div>

                    <div class="summery-contain">
                        <ul>
                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">Ksh. <?= number_format($cartSubtotal) ?></h4>
                            </li>
                        </ul>
                    </div>

                    <ul class="summery-total">
                        <li class="list-total border-top-0">
                            <h4>Total (KES)</h4>
                            <h4 class="price theme-color">Ksh. <?= number_format($cartSubtotal) ?></h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <button onclick="location.href = '<?= Url::to(['/site/checkout']) ?>';"
                                    class="btn btn-animation proceed-btn fw-bold"
                                    <?= empty($dataProvider->getModels()) ? 'disabled title="Your cart is empty!"' : '' ?>>
                                    Process To Checkout
                                </button>

                            </li>
                            <li>
                                <button onclick="location.href = '<?= Url::to(['/site/products']) ?>';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Cart Section End -->


<!-- Footer Section Start -->
<?= $this->render('components/common/_footer') ?>

<!-- Footer Section End -->

<!-- Quick View Modal Box Start -->
<?= $this->render('components/common/_quick-view-modal') ?>

<!-- Quick View Modal Box End -->

<!-- Location Modal Start -->
<?= $this->render('components/common/_location-modal') ?>

<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<?= $this->render('components/common/_deal-box-modal') ?>

<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<?= $this->render('components/common/_add-to-cart-modal') ?>

<!-- Add to cart Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->


<?php
$csrfToken = Yii::$app->request->getCsrfToken();
$updateUrl = \yii\helpers\Url::to(['cart-product/update-quantity']);
$removeUrl = \yii\helpers\Url::to(['cart-product/remove-product']);

$js = <<<JS
(function() {
    window.updateQuantity = function(button, increment) {
        const input = $(button).siblings('.qty-input');
        const cartId = $(button).siblings('.cart-id').val();
        let currentValue = parseInt(input.val()) || 1;

        // Increment or decrement the quantity
        const newValue = Math.max(currentValue + increment, 1);
        input.val(newValue);

        // Submit the updated quantity to the backend via AJAX
        submitQuantity(input, cartId, newValue);
    };

    toastr.options = {
            "closeButton": true, // Enable close button
            "progressBar": true, // Enable progress bar
            "timeOut": 500        // Duration for which the message is displayed
        };

    function submitQuantity(input, cartId, quantity) {
        const csrfToken = "{$csrfToken}";
        $.ajax({
            url: '{$updateUrl}',
            type: 'POST',
            data: {
                cart_id: cartId,
                quantity: quantity,
                _csrf: csrfToken
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message || 'Quantity updated successfully!');
                    // Update the UI dynamically
                    refreshCartRow(input, quantity);
                } else {
                    toastr.error(response.message || 'Failed to update quantity.');
                }
            },
            error: function() {
                toastr.error('An error occurred while updating the quantity.');
            }
        });
    }

    function refreshCartRow(input, quantity) {
        const cartRow = $(input).closest('tr');
        const price = parseFloat(cartRow.find('.price h5').text().replace('Ksh.', '').replace(',', '').trim());
        const subtotalCell = cartRow.find('.subtotal h5');

        // Calculate the new subtotal for this row
        const newSubtotal = price * quantity;

        // Update the subtotal in the UI
        subtotalCell.text('Ksh. ' + newSubtotal.toLocaleString());

        // Refresh the total cart summary
        refreshCartTotal();
    }

    function toggleCheckoutButton() {
    const hasItems = $('.cart-section table tbody tr').length > 0;
    const checkoutButton = $('.proceed-btn');

    if (hasItems) {
        checkoutButton.removeAttr('disabled').removeAttr('title');
    } else {
        checkoutButton.attr('disabled', 'disabled').attr('title', 'Your cart is empty!');
    }
}

// Call this function after cart updates
$(document).on('cartUpdated', toggleCheckoutButton);


    function refreshCartTotal() {
        let cartSubtotal = 0;

        // Iterate through each row and sum up the subtotals
        $('.cart-section table .subtotal h5').each(function() {
            const rowSubtotal = parseFloat($(this).text().replace('Ksh.', '').replace(',', '').trim()) || 0;
            cartSubtotal += rowSubtotal;
        });

        // Update the subtotal and total in the summary box
        $('.summery-box .price.theme-color').text('Ksh. ' + cartSubtotal.toLocaleString());
        $('.summery-box .summery-contain ul li .price').text('Ksh. ' + cartSubtotal.toLocaleString());
    }

$(document).on('click', '.remove', function(e) {
    const cartId = $(this).data('cart-id');
    const csrfToken = "{$csrfToken}";

    $.ajax({
        url: '{$removeUrl}', // Path to your `removeProduct` action
        type: 'POST',
        data: {
            cart_id: cartId,
        },
        success: function(response) {
            const result = JSON.parse(response);
            if (result.success) {
                // Save the response to local storage
                localStorage.setItem('removeResponse', JSON.stringify(result));
                // Refresh the page
                location.reload();
            } else {
                toastr.error(result.message || 'Failed to remove product.');
            }
        },
        error: function() {
            toastr.error('An error occurred while removing the product.');
        }
    });
});

// Display toastr message after page reload
$(window).on('load', function() {
    const removeResponse = JSON.parse(localStorage.getItem('removeResponse'));
    if (removeResponse) {
        toastr.options = {
            "closeButton": true, // Enable close button
            "progressBar": true, // Enable progress bar
            "timeOut": 500        // Duration for which the message is displayed
        };
        toastr.success(removeResponse.message || 'Product removed successfully!');
        // Clear the local storage after displaying the message
        localStorage.removeItem('removeResponse');
    }
});

})();
JS;

// Register the JavaScript in the view
$this->registerJs($js, \yii\web\View::POS_END);
?>