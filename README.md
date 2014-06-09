Facti
=============

Facti PHP SDK

Librería en PHP para interactuar con el API de http://www.facti.mx.


**Uso**

```php
$Facti = new Facti(FACTI_CLIENTID, FACTI_KEY);//-> Para entorno de pruebas
//-> En producción mandar 3er parámetro opcional "true" --> $Facti = new Facti(FACTI_CLIENTID, FACTI_KEY, true);
		$result = $Facti->creditCardChargeCK(array(
			'from_rfc'=>CIDE_RFC
			,'to_email'=>$_SESSION['user_courses']['email']//-> Change this value to the current user's logged in e-mail
			,'number'=>$ccNumber
			,'exp_month'=>$ccExpMonth
			,'exp_year'=>$ccExpYear
			,'cvc'=>$ccCVV
			,'name'=>$ccOwnersName
			,'description'=>'Payment description'
			,'amount'=>$courseAmount
			,'currency'=>'MXN'
		));
```
