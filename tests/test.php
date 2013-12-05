<?php 
	require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

	use Facti\Facti;

	//echo Facti::world();

	$Facti = new Facti('8f14e45fceea167a5a36dedd4bea2543', 'bedbce3ae19181f53b56b99f0e92e3ac', true);
	$result = $Facti->creditCardChargeCK(array(
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
	));
?>