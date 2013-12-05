<?php
	namespace Facti;
	use Guzzle\Http\Client;

	class Facti{
		//var $url = '';//-> Init in sandboxMode
		var $env = 'sandbox';
		var $clientId = '';
		var $apiKEY = '';

		//-> Construct function
		function __construct($clientId, $apiKEY, $productionEnv=false) {
			//-> Check environment
			if($productionEnv==true)
				$this->env = 'production';

			
			/*
			// Prevent users from accessing sensitive files by sanitizing input
			$_POST = array('firstname' => '@/etc/passwd');
			$request = $client->post('http://www.example.com', array(), array (
			    'firstname' => str_replace('@', '', $_POST['firstname'])
			));
			*/

			try{
				$client = new Client();
				$request = $client->post('https://api.facti.mx/v1/user/authenticate', array(), array(
				    'client_id' => $clientId
				    ,'api_key' => $apiKEY
				));
				$response = $request->send();
				//echo $response->getContentType();
				//echo $response->getBody();
				$resultObj = json_decode($response->getBody());
				if($resultObj->result==1){
					$this->clientId = $clientId;
					$this->apiKEY = $apiKEY;
				}else{
					die($resultObj->msg.' (Facti)');
				}
			} catch (Exception $e) {
			    echo 'Error occurred: ',  $e->getMessage(), "\n";
			}
				
		}

		//-> Function to make a payment with credit card (CONEKTA)
		function creditCardChargeCK($arrayDetails){
			if(is_array($arrayDetails)){
				if( isset($arrayDetails['number']) && !empty($arrayDetails['number']) && is_numeric($arrayDetails['number'])
				&& isset($arrayDetails['exp_month']) && !empty($arrayDetails['exp_month']) && is_numeric($arrayDetails['exp_month'])
				&& isset($arrayDetails['exp_year']) && !empty($arrayDetails['exp_year']) && is_numeric($arrayDetails['exp_year'])
				&& isset($arrayDetails['cvc']) && !empty($arrayDetails['cvc']) && is_numeric($arrayDetails['cvc'])
				&& isset($arrayDetails['name']) && !empty($arrayDetails['name'])
				&& isset($arrayDetails['description']) && !empty($arrayDetails['description'])
				&& isset($arrayDetails['amount']) && !empty($arrayDetails['amount']) && is_numeric($arrayDetails['amount'])
				&& isset($arrayDetails['currency']) && !empty($arrayDetails['currency'])
				&& isset($arrayDetails['from_rfc']) && !empty($arrayDetails['from_rfc'])
				&& isset($arrayDetails['to_email']) && !empty($arrayDetails['to_email']) ){
					try{
						$client = new Client();
						$url = ($this->env=="sandbox")? '' : 'http://api.facti.tst/v1/payments/creditcard_charge_ck.php';
						$request = $client->post($url, array(), array(
						    'client_id' => $this->clientId
						    ,'api_key' => $this->apiKEY
						    ,'from_rfc' => $arrayDetails['from_rfc']
						    ,'to_email' => $arrayDetails['to_email']
						    ,'cd_number' => $arrayDetails['number']
						    ,'cd_exp_month' => $arrayDetails['exp_month']
						    ,'cd_exp_year' => $arrayDetails['exp_year']
						    ,'cd_cvc' => $arrayDetails['cvc']
						    ,'cd_owner_name' => $arrayDetails['name']
						    ,'descripcion' => $arrayDetails['description']
						    ,'amount' => $arrayDetails['amount']
						    ,'currency' => $arrayDetails['currency']
						));
						$response = $request->send();
						//echo $response->getContentType();
						//echo $response->getBody();
						$resultObj = json_decode($response->getBody());
						if($resultObj->result==1){
							return $resultObj;
						}else{
							die($resultObj->msg.' (Facti)');
						}
					} catch (Exception $e) {
					    echo 'Error occurred: ',  $e->getMessage(), "\n";
					}
				}else{
					die("No se han recibido los parámetros necesarios para procesar el pago. (Facti)");
				}
			}else
				die("No se han mandado los tipos de datos requeridos para realizar el pago. (Facti)");
			
		}


		public static function world(){
        	return 'Hello World, Composer!';
    	}

	}
?>