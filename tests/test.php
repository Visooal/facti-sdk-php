<?php 
	require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

	use Facti\Facti;

	//echo Facti::world();

	$Facti = new Facti('8f14e45fceea167a5a36dedd4bea2543', 'bedbce3ae19181f53b56b99f0e92e3ac', true);
	//8f14e45fceea167a5a36dedd4bea2543, bedbce3ae19181f53b56b99f0e92e3ac
	//e4da3b7fbbce2345d7772b0674a318d5, e21953196ff0a0c5a4cd8f3915179037
	/*$result = $Facti->creditCardChargeCK(array(
		'from_rfc'=>'CID74112584A'
		,'to_email'=>'gustavomanolo@gmail.com'
		,'number'=>'4111111111111111'
		,'exp_month'=>12
		,'exp_year'=>2015
		,'cvc'=>123
		,'name'=>'Thomas Logan'
		,'description'=>'Payment description'
		,'amount'=>200
		,'currency'=>'MXN'
	));*/
	

	//-> Get payment ways for an RFC
	//$result = $Facti->getCompanyRFCPaymentWays('CID74112584A');

	//-> Get STP references for a new payment request
	$arrayAdParams = array(
		'user_id'=>1
		,'course_id'=>2
	);
	$result = $Facti->STPPaymentRequest(array(
		'from_rfc'=>'CID74112584A'
		,'to_email'=>'gustavomanolo@gmail.com'
		,'total_amount'=>200
	), $arrayAdParams);
	var_dump($result);

	/*-> from_rfc, to_email, to_rfc, total_amount, limit_payment_date, send_email
		-> to_rfc: Si no se manda RFC se coloca el genérico: XAXX010101000
	*/
	
?>