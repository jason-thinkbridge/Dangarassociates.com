<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("pk_test_wAHLBj9ujy5r6x3T9xdBFCkn");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
$charge = \Stripe\Charge::create(array(
  "amount" => $_POST('amount')*100, // amount in cents, again
  "currency" => "usd",
  "source" => $token,
  "description" => $_POST('invoice-number')
));
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
}
?>