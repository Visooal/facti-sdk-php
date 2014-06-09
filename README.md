Facti
=============

Facti PHP SDK

Librería en PHP para interactuar con el API de http://www.facti.mx.

## Instalación
Agrega Facti-SDK-PHP a tu archivo composer.json. Si no usas Composer, deberías, ya que es una forma excelente de incluir y administrar dependencias en tu aplicación PHP.
```
{
    "require": {
        "facti/facti-sdk-php": "dev-master"
    }
}
```
Finalmente, incluye el autoloader al inicio de tu script PHP:
```
require 'vendor/autoload.php';
```

## Uso

```php
$Facti = new Facti(FACTI_CLIENTID, FACTI_KEY);//-> Para entorno de pruebas
//-> En producción mandar 3er parámetro opcional "true" --> $Facti = new Facti(FACTI_CLIENTID, FACTI_KEY, true);
$result = $Facti->creditCardChargeCK(array(
	'from_rfc'=>RECEIVER_RFC//-> El RFC de la empresa/usuario que recibe el pago
	,'to_email'=>USERS_EMAIL//-> El e-mail del cliente que realizará el pago
	,'number'=>CC_NUMBER//-> El número de tarjeta del cliente
	,'exp_month'=>CC_EXP_MONTH//-> El mes de expiración de la tarjeta de crédito del cliente
	,'exp_year'=>CC_EXP_YEAR//-> El año de expiración de la tarjeta de crédito del cliente
	,'cvc'=>CC_CV//-> El código CV de la tarjeta de crédito del cliente
	,'name'=>CC_OWNERS_NAME//->El nombre del tarjetahabiente, tal cual aparece en la tarjeta de crédito
	,'description'=>PAYMENT_DESCRIPTION//-> Descriptión del pago a realizar
	,'amount'=>AMOUNT//-> Monto total del pago a realizar
	,'currency'=>'MXN'
));
```
