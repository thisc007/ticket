<?php 
declare(strict_types=1);

namespace lib;
use lib\Empresa;
class TicketAndGo extends Empresa //extensão de empresa
{
    public function __construct($id){
        $this->id = $id;
        $this->funcionarios = [];
    }
    
    public function addFuncionario($funcionario) //adiciona usuário baseado nos permitidos
    {
        $permitidos = [K_FUNCIONARIO_HONESTO, K_FUNCIONARIO_COOPERATIVO, K_FUNCIONARIO_ESPERTO, K_FUNCIONARIO_MOTIVADO];
        //print_r($funcionario);
        //die;
        if(in_array($funcionario->tipo, $permitidos))
        {
            $this->funcionarios[] = $funcionario;
        }
        
    }

    public function getFuncionarios() //pega funcionários 
    {
        return $this->funcionarios;
    }
}

/*define('K_FUNCIONARIO_MOTIVADO', 1);
define('K_FUNCIONARIO_ESPERTO', 2);
define('K_FUNCIONARIO_HONESTO', 3);
define('K_FUNCIONARIO_DESONESTO', 4);
define('K_FUNCIONARIO_PREGUICOSO', 5);
define('K_FUNCIONARIO_COOPERATIVO', 6);*/