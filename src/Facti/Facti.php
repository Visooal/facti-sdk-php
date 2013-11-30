<?php
	namespace Facti;
	use Guzzle\Http\Client;

	class Facti{
		//var $url = '';//-> Init in sandboxMode
		var $env = 'sandbox';

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


			$client = new Client();
			$request = $client->post('https://api.facti.mx/v1/user/authenticate', array(), array(
			    'client_id' => $clientId
			    ,'api_key' => $apiKEY
			));
			$response = $request->send();
			echo $response->getContentType();
			//https://github.com/guzzle/guzzle/blob/master/src/Guzzle/Http/Message/Response.php

			//-> Verify credentials
			//url = https://api.facti.mx/v1/user/authenticate
			/*
			send 
			'client_id'=>array(
					'valid_empty'=>true
					,'data_type'=>""
				)
			,'api_key'=>array(
			*/
		}


		public static function world(){
        	return 'Hello World, Composer!';
    	}

	}
?>