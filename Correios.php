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

    private string $codAdministrativo;
    private string $senha;
    private string $codServico;
    private string $cepOrigem;
    private string $cepDestino;
    private float $peso;
    private int $formato;
    private int $comprimento;
    private int $altura;
    private int $largura;
    private int $diametro;
    private string $maoPropria;
    private float $valorDeclarado;
    private string $avisoRecebimento;
    private string $tipoRetornoRequisicao;

    public function calculateDelivery(Package $package)
    {
        $params = $this->setParams($package);

        $params = http_build_query($params);

        $urlCalculaPrazo = self::URL_CORREIOS . '/CalcPrecoPrazo.aspx';

        $xml = simplexml_load_file($urlCalculaPrazo);
    }

    public function configContract(ContratoCorreios $contratoCorreios)
    {

    }

    private function setParams(Package $package)
    {
        $params = [];

        foreach ($this->paramNames as $key => $value) {
            $params[$value] = $package->{$key};
        }

        return $params;
    }
}