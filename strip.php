<?php
require 'config.php';

if (isset($_GET['order'])) {
    $user_id=$_COOKIE['user_id'];
    $f_name=$_GET['f_name'];
    $l_name=$_GET['l_name'];
    $s_address=$_GET['s_address'];
    $city=$_GET['city'];
    $country=$_GET['country'];
    $p_code=$_GET['p_code'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $check_method=$_GET['check_method'];
    $pro_id=$_GET['pro_id'];
	$qty=$_GET['qty'];
	$cid=$_GET['cid'];
    $amount=$_GET['amount'];
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="stripe-php-master/img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="stripe-php-master/img/apple-touch-icon/180x180.png">
        <link rel="icon" href="stripe-php-masterimg/apple-touch-icon/180x180.png">
        <meta name="description" content="Live Demo at CodexWorld - Stripe Payment Gateway Integration in PHP by CodexWorld">
        <meta name="keywords" content="demo, codexworld demo, project demo, live demo, tutorials, programming, coding">
        <meta name="author" content="CodexWorld">
        <title>Stripe Payment Gateway Integration </title>
        <!-- Bootstrap core CSS -->
        <link href="stripe-php-master/css/bootstrap.css" rel="stylesheet">
		
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        
<!-- Stylesheet file -->
<link rel="stylesheet" href="stripe-php-master/css/style.css">
	
<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>

</head>
<body>
	<br><br><br>
	<h3 style="margin-left:200px; margin-bottom:40px;"><b>Payment By Credit Card:</b></h3>
        <div class="container bodyBck">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3><b>Total Payment:</b> $<?php echo $amount ?></h3>
					</div>
					<div class="panel-body">
						<!-- Display errors returned by createToken -->
						<div id="paymentResponse"></div>
						
						<!-- Payment form -->
						<form action="submit.php?amount=<?php echo $amount ?>&f_name=<?php echo $f_name; ?>&l_name=<?php echo $l_name;?>&user_id=<?php echo $user_id;?>&s_address=<?php echo $s_address;?>&city=<?php echo $city;?>&country=<?php echo $country;?>&p_code=<?php echo $p_code;?>&email=<?php echo $email;?>&phone=<?php echo $phone;?>&check_method=<?php echo $check_method;?>&pro_id=<?php echo $pro_id;?>&qty=<?php echo $qty?>&cid=<?php echo $cid?>" method="post" id="paymentFrm">
							<div class="form-group">
								<label>NAME</label>
								<input type="text" name="name" id="name" class="field" placeholder="Enter name" required="" autofocus="">
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<h4><?php echo $email; ?></h4>
							</div>
							<div class="form-group">
								<label>CARD NUMBER</label>
								<div id="card_number" class="field"></div>
							</div>
							<div class="row">
								<div class="left">
									<div class="form-group">
										<label>EXPIRY DATE</label>
										<div id="card_expiry" class="field"></div>
									</div>
								</div>
								<div class="right">
									<div class="form-group">
										<label>CVC CODE</label>
										<div id="card_cvc" class="field"></div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
        	<!-- JavaScript -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     	        <script src="http://demos.codexworld.com/includes/js/bootstrap.js"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
    	<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('pk_test_51ItqhrGZZUIGlDrGrlAa7dtM7hEAxJzvLc5BOGOc7J3mwQpaeuqlM7jYhAKBpKWiT5sWoijVxgtbWvrI1rU0hI9F00a3voZtZe');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
		fontWeight: 400,
		fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
		fontSize: '16px',
		lineHeight: '1.4',
		color: '#555',
		backgroundColor: '#fff',
		'::placeholder': {
			color: '#888',
		},
	},
	invalid: {
	  color: '#eb1c26',
	}
};

var cardElement = elements.create('cardNumber', {
	style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
  'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
  'style': style
});
cvc.mount('#card_cvc');

// Get payment form element
var form = document.getElementById('paymentFrm');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
	if (event.error) {
		resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
	} else {
		resultContainer.innerHTML = '';
	}
});

// Create a token when the form is submitted.
var form = document.getElementById('paymentFrm');
form.addEventListener('submit', function(e) {
	e.preventDefault();
	createToken();
});

// Create single-use token to charge the user
function createToken() {
	stripe.createToken(cardElement).then(function(result) {
		if (result.error) {
			// Inform the user if there was an error
			resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
		} else {
			// Send the token to your server
			stripeTokenHandler(result.token);
		}
	});
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
	// Insert the token ID into the form so it gets submitted to the server
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripeToken');
	hiddenInput.setAttribute('value', token.id);
	form.appendChild(hiddenInput);
	
	// Submit the form
	form.submit();
}
</script>
</body>
</html>