<?php

class Correios
{
    const URL_CORREIOS = 'http://ws.correios.com.br/calculador';

    const SERVICO_PAC = '04510';
    const SERVICO_SEDEX = '04014';
    const SERVICO_SEDEX10 = '04790';
    const SERVICO_SEDEX12 = '04782';
    const SERVICO_SEDEXHOJE = '04804';

    const SERVICOS_CORREIOS = [
        '04510' => 'PAC',
        '04014' => 'SEDEX',
        '04790' => 'SERVICO_SEDEX10',
        '04782' => 'SERVICO_SEDEX12',
        '04804' => 'SERVICO_SEDEXHOJE',
    ];

    private bool $hasContract = false;
    private string $codigoAdministrativo = '';
    private string $senha = '';
    private string $codServico;
    private string $cepOrigem;
    private string $cepDestino;
    private float $peso;
    private int $formato = 1;
    private int $comprimento;
    private int $altura;
    private int $largura;
    private int $diametro;
    private string $maoPropria = 'n';
    private float $valorDeclarado = 0;
    private string $avisoRecebimento = 'n';
    private string $tipoRetornoRequisicao = 'xml';

    private $paramNames = [
        'codigoAdministrativo' => 'nCdEmpresa',
        'senha' => 'sDsSenha',
        'codServico' => 'nCdServico',
        'cepOrigem' => 'sCepOrigem',
        'cepDestino' => 'sCepDestino',
        'peso' => 'nVlPeso',
        'formato' => 'nCdFormato',
        'comprimento' => 'nVlComprimento',
        'altura' => 'nVlAltura',
        'largura' => 'nVlLargura',
        'diametro' => 'nVlDiametro',
        'maoPropria' => 'sCdMaoPropria',
        'valorDeclarado' => 'nVlValorDeclarado',
        'avisoRecebimento' => 'sCdAvisoRecebimento',
        'tipoRetornoRequisicao' => 'StrRetorno'
    ];

    public function configContract(ContratoCorreios $contratoCorreios)
    {
        $this->codigoAdministrativo = $contratoCorreios->getCodAdministrativo();
        $this->senha = $contratoCorreios->getSenha();
    }

    public function calculateDelivery(Package $package)
    {
        $this->setPackageProperties($package);

        $this->setDeliveryProperties();

        $this->hasContract;
        $params = http_build_query($params);

        $urlCalculaPrazo = self::URL_CORREIOS . '/CalcPrecoPrazo.aspx';

        $xml = simplexml_load_file($urlCalculaPrazo);
    }

    private function setDeliveryProperties()
    {
        $this->codServico = self::SERVICOS_CORREIOS[$this->codServico];
        $this->cepOrigem = $this->cepOrigem;
        $this->cepDestino = $this->cepDestino;
        $this->peso = $this->peso;
        $this->formato = $this->formato;
        $this->comprimento = $this->comprimento;
        $this->altura = $this->altura;
        $this->largura = $this->largura;
        $this->diametro = $this->diametro;
        $this->maoPropria = $this->maoPropria;
        $this->valorDeclarado = $this->valorDeclarado;
        $this->avisoRecebimento = $this->avisoRecebimento;
        $this->tipoRetornoRequisicao = $this->tipoRetornoRequisicao;   
    }

    private function setPackageProperties(Package $package)
    {
        $this->peso = $package->getWeight();
        $this->altura = $package->getHeight();
        $this->largura = $package->getWidth();
        $this->comprimento = $package->getLength();
        $this->diametro = $package->getDiameter();
        $this->formato = $package->getFormat();
    }
}