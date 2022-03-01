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

    private string $codigoAdministrativo = '';
    private string $senha = '';
    private string $codServico;
    private string $cepOrigem;
    private string $cepDestino;
    private string $peso;
    private string $formato = '1';
    private string $comprimento;
    private string $altura;
    private string $largura;
    private string $diametro;
    private string $maoPropria = 'n';
    private string $valorDeclarado = '0';
    private string $avisoRecebimento = 'n';
    private string $tipoRetornoRequisicao = 'xml';
    private $result;

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

    private function setPackageProperties(Package $package)
    {
        $this->peso = $package->getWeight();
        $this->altura = $package->getHeight();
        $this->largura = $package->getWidth();
        $this->comprimento = $package->getLength();
        $this->diametro = $package->getDiameter();
        $this->formato = $package->getFormat();
    }

    public function configContract(ContratoCorreios $contratoCorreios)
    {
        $this->codigoAdministrativo = $contratoCorreios->getCodAdministrativo();
        $this->senha = $contratoCorreios->getSenha();
    }

    public function calculateDelivery(Package $package)
    {
        $this->setPackageProperties($package);

        $params = $this->getParams();

        $params = http_build_query($params);

        $urlCalculaPrazo = self::URL_CORREIOS . '/CalcPrecoPrazo.aspx?' . $params;

        $this->result = simplexml_load_file($urlCalculaPrazo);
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setCodServico(string $codServico)
    {
        $this->codServico = $codServico;
    }

    public function setZipcodeFrom(string $cep)
    {
        $this->cepOrigem = $cep;
    }

    public function setZipcodeTo(string $cep)
    {
        $this->cepDestino = $cep;
    }

    private function getParams()
    {
        $params = [];

        foreach ($this->paramNames as $key => $value) {
            $params[$value] = $this->{$key};
        }

        return $params;
    }
}