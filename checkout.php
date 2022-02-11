<?php
require './vendor/autoload.php';
header('Content-Type', 'application/json');

$stripe = new Stripe\StripeClient("USE_YOUR_STRIPE_KEY_HERE");
$session = $stripe->checkout->sessions->create([
    "success_url" => "http://localhost:8080/success.html",
    "cancel_url" => "http://localhost:8080/cancel.html",
    "payment_method_types" => ['card', 'alipay'],
    "mode" => 'payment',
    "line_items" => [
        [
           "price_data" =>[
               "currency" =>"gbp",
               "product_data" =>[
                   "name"=> "Mobile",
                   "description" => "Latest mobile 2021"
               ],
               "unit_amount" => 5000
           ],
           "quantity" => 1 
        ],

        [
            "price_data" =>[
                "currency" =>"gbp",
                "product_data" =>[
                    "name"=> "Shirt",
                    "description" => "Light summer shirt"
                ],
                "unit_amount" => 2000
            ],
            "quantity" => 2 
         ]
    ]
]);

echo json_encode($session);

?>