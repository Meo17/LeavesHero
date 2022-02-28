<?php

require_once('stripe-php/init.php');

$stripe = array(
  "secret_key"      => "sk_test_GAjnYKXwUpr8WQnKbBYrK9F1",
  "publishable_key" => "pk_test_o0WOKjCsDlWzx9pL2UVRQPdz"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>