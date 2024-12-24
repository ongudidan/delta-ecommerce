<link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new \app\models\Payment(); // Assuming you have a Payment model
?>

<!-- mobile fix menu start -->
<?= $this->render('components/common/_mobile-fix') ?>

<!-- mobile fix menu end -->

<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg w-100" style="max-width: 28rem;">
        <div class="card-body ">
            <!-- M-Pesa logo with no padding or margin -->
            <div class="text-center p-0 m-0">
                <img src="/web/images/mpesa-logo.png" alt="M-Pesa Logo" class="img-fluid mx-auto d-block" style="max-width: 100px;">
            </div>


            <?php $form = ActiveForm::begin(['id' => 'stkPushForm', 'options' => ['class' => 'needs-validation', 'novalidate' => true]]); ?>

            <!-- Display the amount in a styled div -->
            <div class="text-center mb-4">
                <h4 class="text-secondary pb-3">Amount to Pay</h4>
                <p class="fs-3 text-success fw-bold">KSH <?= number_format($totalSellingPrice, 2) ?></p>
            </div>

            <!-- Hidden amount input field -->
            <div class="d-none">
                <?= $form->field($model, 'amount')->hiddenInput(['id' => 'amount', 'value' => $totalSellingPrice])->label(false) ?>
                <?= $form->field($model, 'external_reference')->hiddenInput(['id' => 'order_id', 'value' => $orderId])->label(false) ?>

            </div>

            <!-- Phone number input -->
            <div class="mb-3">
                <?= $form->field($model, 'phone')->textInput([
                    'id' => 'phone',
                    'placeholder' => 'Enter phone number',
                    'class' => 'form-control',
                    'required' => true,
                ])->label(false) ?>
            </div>

            <!-- Submit button -->
            <div class="form-group">
                <button type="button" id="submitPayment" class="btn btn-primary w-100">Initiate Payment</button>
            </div>

            <?php ActiveForm::end(); ?>

            <!-- Notifications -->
            <div id="notification" class="alert alert-info mt-4 d-none"></div>
            <div id="paymentStatus" class="alert alert-success mt-4 d-none"></div>
        </div>
    </div>
</div>


<script>
    const form = document.getElementById('stkPushForm');
    const notification = document.getElementById('notification');
    const paymentStatus = document.getElementById('paymentStatus');

    document.getElementById('submitPayment').addEventListener('click', async function() {
        const amount = document.getElementById('amount').value;
        const phone = document.getElementById('phone').value;
        const order_id = document.getElementById('order_id').value;


        showNotification('Initiating STK push...', 'info');

        try {
            // Await the response from the server
            const response = await $.ajax({
                url: 'initiate-stk-push', // Your backend endpoint
                type: 'POST',
                dataType: 'json', // Ensure the response is treated as JSON
                data: {
                    amount: amount,
                    phone: phone,
                    order_id: order_id
                }
            });

            if (response.success) {
                showNotification('STK push initiated successfully!', 'success');

                const externalReference = response.data.external_reference;

                if (externalReference) {
                    console.log("External Reference:", externalReference); // For debugging
                    pollPaymentStatus(externalReference); // Start polling with the external reference
                } else {
                    showNotification('Error: External reference not received', 'error');
                }
            } else {
                showNotification(response.message || 'Error initiating STK push.', 'error');
            }
        } catch (error) {
            console.error("Error initiating payment:", error);
            showNotification('Error initiating STK push.', 'error');
        }

    });

    // function pollPaymentStatus(externalReference) {
    //     const pollInterval = setInterval(function() {
    //         $.ajax({
    //             url: `get-status`, // Yii2 action URL
    //             type: 'GET',
    //             data: {
    //                 external_reference: externalReference
    //             }, // Pass external reference as query parameter
    //             success: function(response) {
    //                 if (response.success) {
    //                     const payment = response.payment;
    //                     if (payment.status !== 'QUEUED') {
    //                         clearInterval(pollInterval); // Stop polling if payment is no longer pending
    //                         updatePaymentStatus(payment); // Call a function to update the UI with payment details
    //                     }
    //                 }
    //             },
    //             error: function(error) {
    //                 console.error("Error polling payment status:", error);
    //                 clearInterval(pollInterval); // Stop polling on error
    //                 showNotification('Error polling payment status.', 'error'); // Display an error notification
    //             }
    //         });
    //     }, 5000); // Polling every 5 seconds
    // }

    function pollPaymentStatus(externalReference) {
        const pollInterval = 5000; // Polling every 5 seconds
        const maxPollingTime = 60000; // Maximum polling time of 60 seconds
        let elapsedPollingTime = 0;

        const pollIntervalId = setInterval(function() {
            // Check if the maximum polling time has been exceeded
            if (elapsedPollingTime >= maxPollingTime) {
                clearInterval(pollIntervalId); // Stop polling
                showNotification('Polling timed out. Please try again.', 'error');
                return;
            }

            $.ajax({
                url: `get-status`, // Yii2 action URL
                type: 'GET',
                data: {
                    external_reference: externalReference
                },
                timeout: 10000, // Set timeout of 10 seconds
                success: function(response) {
                    if (response.success) {
                        const payment = response.payment;
                        if (payment.status === 'Success') {
                            clearInterval(pollIntervalId); // Stop polling if payment is no longer pending
                            updatePaymentStatus(payment); // Call a function to update the UI with payment details
                        }
                    }
                },
                error: function(error) {
                    console.error("Error polling payment status:", error);
                    clearInterval(pollIntervalId); // Stop polling on error
                    showNotification('Error polling payment status.', 'error'); // Display an error notification
                }
            });

            // Increment elapsed polling time
            elapsedPollingTime += pollInterval;
        }, pollInterval);
    }



    function updatePaymentStatus(data) {
        // Trigger success actions if payment is successful
        if (data.status === 'Success') {
            notification.classList.add('fade-out'); // Hide notification after a delay
            triggerConfetti(); // Trigger a celebration animation (confetti, etc.)
        }

        // Dynamically construct the status HTML
        const statusHtml = `
        <h3 class="font-bold ${data.status === 'Success' ? 'text-green-700' : 'text-red-700'}">
            ${data.status}
        </h3>
        <p><strong>Amount:</strong> ${data.amount.toLocaleString('en-US', { style: 'currency', currency: 'USD' })}</p>
        <p><strong>Receipt Number:</strong> ${data.mpesa_receipt_number || 'N/A'}</p>
        <p><strong>Phone:</strong> ${data.phone || 'N/A'}</p>
        <p><strong>Result:</strong> ${data.result_desc || 'N/A'}</p>
    `;

        // Update the payment status element
        paymentStatus.innerHTML = statusHtml;
        paymentStatus.className = `mt-4 p-4 rounded-lg ${
        data.status === 'Success' ? 'bg-green-100 border-green-700' : 'bg-red-100 border-red-700'
    }`;
        paymentStatus.classList.add('fade-in'); // Add animation class for a smooth appearance
        paymentStatus.classList.remove('hidden'); // Ensure the element is visible
    }


    function showNotification(message, type) {
        notification.textContent = message;
        notification.className = `mt-4 p-4 rounded-lg ${type === 'error' ? 'bg-red-100 text-red-700' : type === 'success' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700'}`;
        notification.classList.remove('hidden');
    }

    // Confetti animation
    var count = 200;
    var defaults = {
        origin: {
            y: 0.7
        }
    };

    function fire(particleRatio, opts) {
        confetti({
            ...defaults,
            ...opts,
            particleCount: Math.floor(count * particleRatio)
        });
    }

    function triggerConfetti() {
        fire(0.25, {
            spread: 26,
            startVelocity: 55,
        });
        fire(0.2, {
            spread: 60,
        });
        fire(0.35, {
            spread: 100,
            decay: 0.91,
            scalar: 0.8
        });
        fire(0.1, {
            spread: 120,
            startVelocity: 25,
            decay: 0.92,
            scalar: 1.2
        });
        fire(0.1, {
            spread: 120,
            startVelocity: 45,
        });
    }
</script>