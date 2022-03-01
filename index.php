<?php

require_once './Package.php';
require_once './Correios.php';
require_once './ContratoCorreios.php';

$options = [
    'nCdEmpresa' => '',
    'sDsSenha' => '',
    'nCdServico' => Correios::SERVICO_PAC,
    'sCepOrigem' => '09010100',
    'sCepDestino' => '24310430',
    'nVlPeso' => 1,
    'nCdFormato' => 1,
    'nVlComprimento' => 15,
    'nVlAltura' => 15,
    'nVlLargura' => 15,
    'nVlDiametro' => 0,
    'sCdMaoPropria' => 'n',
    'nVlValorDeclarado' => 0,
    'sCdAvisoRecebimento' => 'n',
    'StrRetorno' => 'xml'
];

$package = new Package();
$package->setWeight(1);
$package->setHeight(15);
$package->setWidth(15);
$package->setLength(15);
$package->setDiameter(0);

$contrato = new ContratoCorreios();
$contrato->setCodAdministrativo('123456789');
$contrato->setSenha('senha');

$correios = new Correios();
$correios->calculateDelivery($package);
// $correios->configContract($contratoCorreios);
