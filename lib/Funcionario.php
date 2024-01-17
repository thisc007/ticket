<?php
//Constantes de cadastro de funcionários
define('K_FUNCIONARIO_MOTIVADO', 1);
define('K_FUNCIONARIO_ESPERTO', 2);
define('K_FUNCIONARIO_HONESTO', 3);
define('K_FUNCIONARIO_DESONESTO', 4);
define('K_FUNCIONARIO_PREGUICOSO', 5);
define('K_FUNCIONARIO_COOPERATIVO', 6);

class Funcionario
{
    public $id;
    public $nome;
    public $tipo;

    public function __construct($id, $nome, $tipo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        if (
            $tipo != K_FUNCIONARIO_MOTIVADO
            and $tipo != K_FUNCIONARIO_ESPERTO
            and $tipo != K_FUNCIONARIO_HONESTO
            and $tipo != K_FUNCIONARIO_HONESTO
            and $tipo != K_FUNCIONARIO_PREGUICOSO
            and $tipo != K_FUNCIONARIO_DESONESTO
            and $tipo != K_FUNCIONARIO_COOPERATIVO
        ) {
            trigger_error('Este tipo de funcionário não é aceito', E_USER_ERROR);
        }
    }

    public function getId() //envia o id do funcionário solicitado
    {
        return $this->id;
    }

    public function getNome() //envia o nome do funcionário solicitado
    {
        return $this->nome;
    }

    public function getTipo() //envia o tipo do funcionário solicitado (definido nas constantes)
    {
        return $this->tipo;
    }
}
