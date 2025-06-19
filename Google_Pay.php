<?php
session_start();
include 'connection.php';

if (!isset($_GET['booking_id'])) {
    die("Invalid Booking Request.");
}

$booking_id = $_GET['booking_id'];

// ✅ Fetch booking details from database
$stmt = $conn->prepare("SELECT total_price FROM bookings WHERE id = ?");
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total_price = $row['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Pay Checkout</title>
    <script async src="https://pay.google.com/gp/p/js/pay.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, rgba(147, 198, 253, 0.9), rgba(255, 255, 255, 0.9)), 
                        url('https://www.tripcentral.ca/blog/wp-content/uploads/2012/08/Family-Silouette.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-box {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        .payment-box h2 {
            margin-top: 0;
            color: #333;
        }

        .payment-box p {
            font-size: 18px;
            color: #555;
        }

        #gpay-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        form {
            display: none;
        }
    </style>

    <script>
        function onGooglePayLoaded() {
            const paymentsClient = new google.payments.api.PaymentsClient({ environment: 'TEST' });

            const paymentDataRequest = {
                apiVersion: 2,
                apiVersionMinor: 0,
                allowedPaymentMethods: [{
                    type: 'CARD',
                    parameters: {
                        allowedCardNetworks: ['VISA', 'MASTERCARD'],
                        allowedAuthMethods: ['PAN_ONLY', 'CRYPTOGRAM_3DS']
                    },
                    tokenizationSpecification: {
                        type: 'PAYMENT_GATEWAY',
                        parameters: {
                            gateway: 'example',
                            gatewayMerchantId: 'your_merchant_id'
                        }
                    }
                }],
                merchantInfo: {
                    merchantId: 'your_merchant_id',
                    merchantName: 'Vihara Travels'
                },
                transactionInfo: {
                    totalPriceStatus: 'FINAL',
                    totalPrice: '<?= $total_price ?>',
                    currencyCode: 'INR'
                }
            };

            const googlePayButton = paymentsClient.createButton({
                onClick: () => {
                    paymentsClient.loadPaymentData(paymentDataRequest)
                        .then(paymentData => {
                            document.getElementById("payment_data").value = JSON.stringify(paymentData);
                            document.getElementById("payment_form").submit();
                        })
                        .catch(err => console.error("Google Pay Error:", err));
                }
            });

            document.getElementById("gpay-button").appendChild(googlePayButton);
        }
    </script>
</head>
<body onload="onGooglePayLoaded()">

    <div class="payment-box">
        <h2>Complete Your Payment</h2>
        <p>Total Price: ₹<?= $total_price ?></p>

        <div id="gpay-button"></div>

        <form id="payment_form" action="verify_payment.php" method="POST">
            <input type="hidden" name="payment_data" id="payment_data">
            <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
        </form>
    </div>

</body>
</html>
