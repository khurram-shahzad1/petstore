<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51ItqhrGZZUIGlDrGrlAa7dtM7hEAxJzvLc5BOGOc7J3mwQpaeuqlM7jYhAKBpKWiT5sWoijVxgtbWvrI1rU0hI9F00a3voZtZe";

$secretKey="sk_test_51ItqhrGZZUIGlDrGUy2rsnfnmB8tqNfBZ2sw2dbwLFzqVOJJfNnSVWLz2yGb2u60M0QN9iPQojtulCxT5wKUlhJP00Dh4pEaE8";

\Stripe\Stripe::setApiKey($secretKey);
?>