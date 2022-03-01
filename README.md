# Correios-Facil
 Esse será um Modulo dos Correios para Prestashop

Por enquanto implementei apenas o cálculo do frete com e sem contrato

```php
<?php

require_once './Package.php';
require_once './Correios.php';

$correios = new Correios();
$package = new Package();

$package->setWeight(1);
$package->setHeight(15);
$package->setWidth(15);
$package->setLength(15);
$package->setDiameter(0);

// if you want to use the same credentials for all requests
// require_once './ContratoCorreios.php';
// $contrato = new ContratoCorreios();
// $contrato->setCodAdministrativo('123456789');
// $contrato->setSenha('senha');
// $correios->configContract($contrato);

$correios->setCodServico(Correios::SERVICO_PAC);
$correios->setZipcodeFrom('09010100');
$correios->setZipcodeTo('24310430');

// for now, there is only this one method
$correios->calculateDelivery($package);

var_dump($correios->getResult());
```