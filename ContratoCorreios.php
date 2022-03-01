<?php

class ContratoCorreios{
    private string $codAdministrativo;
    private string $senha;

    /**
     * Get the value of codAdministrativo
     */ 
    public function getCodAdministrativo()
    {
        return $this->codAdministrativo;
    }

    /**
     * Set the value of codAdministrativo
     *
     * @return  self
     */ 
    public function setCodAdministrativo($codAdministrativo)
    {
        $this->codAdministrativo = $codAdministrativo;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}