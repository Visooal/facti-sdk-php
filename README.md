Facti
=============

Facti PHP SDK

Librería en PHP para interactuar con el API de http://www.facti.mx.

## Instalación

## Uso

```php
$Facti = new Facti(FACTI_CLIENTID, FACTI_KEY);//-> Para entorno de pruebas
//-> En producción mandar 3er parámetro opcional "true" --> $Facti = new Facti(FACTI_CLIENTID, FACTI_KEY, true);
$result = $Facti->creditCardChargeCK(array(
	'from_rfc'=>RECEIVER_RFC
	,'to_email'=>USERS_EMAIL
	,'number'=>CC_NUMBER
	,'exp_month'=>CC_EXP_MONTH
	,'exp_year'=>CC_EXP_YEAR
	,'cvc'=>CC_CV
	,'name'=>CC_OWNERS_NAME
	,'description'=>PAYMENT_DESCRIPTION
	,'amount'=>AMOUNT
	,'currency'=>'MXN'
));
```
