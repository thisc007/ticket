<?php
namespace lib;
class Empresa
{
    public $id;
    public $nome;
    public $funcionarios = [];

    public function __construct($id)
    {
        $this->nome = 'Empresa número ' . $id;
        $this->funcionarios = [];
    }

    
    public function addFuncionario($funcionario) // Adiciona funcionários de empresa
    {
        //print_r($funcionario);
        $this->funcionarios[] = $funcionario;
    }

    public function getFuncionarios() //exibe funcionários da empresa
    {
        return $this->funcionarios;
    }
}
