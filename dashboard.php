<?php

include 'lib/Funcionarios.php';
include 'lib/Empresa.php';
include 'lib/Funcionario.php';
include 'lib/Pagina.php';
include 'lib/TicketAndGo.php';

$funcionarios = new Funcionarios();
$funcionarios2 = new Funcionarios();
$empresa = new lib\Empresa(1);
$ticketngo = new lib\TicketAndGo(1);
$conteudo = '';

//adiciona funcionários a empresa.
while ($funcionario = $funcionarios->pegarFuncionario()) {
    $empresa->addFuncionario($funcionario);
}
$arFuncionarios = $empresa->getFuncionarios();
$ctp = array_column($arFuncionarios, 'tipo');


while ($funcionario2 = $funcionarios2->pegarFuncionario()) {
    $ticketngo->addFuncionario($funcionario2);
}
$tagFuncionarios = $ticketngo->getFuncionarios();
$tctp = array_column($tagFuncionarios, 'tipo');
//print_r(array_count_values($ctp));

$htmlConteudo = '';
//print_r($arFuncionarios);
$htmlConteudo = '
    <legend>Dashboard</legend>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
    
                <div class="card-body">
                    <h5 class="card-title">Geral</h5>
                    <table table class="table">
                        <thead>          
                            <th>Tipo</th>
                            <th>%</th>
                        </thead>
                        <tbody>';
$cont = count($arFuncionarios); //qtd de funcionários geral

foreach (array_count_values($ctp) as $k => $g) {
    switch ($g) {
        case 1:
            $tipo = 'FUNCIONARIO MOTIVADO';
            break;
        case 2:
            $tipo = 'FUNCIONARIO ESPERTO';
            break;
        case 3:
            $tipo = 'FUNCIONARIO HONESTO';
            break;
        case 4:
            $tipo = 'FUNCIONARIO DESONESTO';
            break;
        case 5:
            $tipo = 'FUNCIONARIO PREGUICOSO';
            break;
        case 6:
            $tipo = 'FUNCIONARIO COOPERATIVO';
            break;

    }
    $htmlConteudo .= '<tr>
                                                <td>' . $tipo . '</td>
                                                <td>' . round(($g/$cont)*100, 2) . '%</td>
                                                </tr>';
}


$htmlConteudo .= '</tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
    
                <div class="card-body">
                    <h5 class="card-title">TicketAndGo</h5>
                    <table table class="table">
                        <thead>          
                            <th>Tipo</th>
                            <th>%</th>
                        </thead>
                        <tbody>';
                        $cont = count($tagFuncionarios); //qtd de funcionários geral
                        
                        foreach (array_count_values($tctp) as $k => $t) {
                            switch ($t) {
                                case 1:
                                    $tipo = 'FUNCIONARIO MOTIVADO';
                                    break;
                                case 2:
                                    $tipo = 'FUNCIONARIO ESPERTO';
                                    break;
                                case 3:
                                    $tipo = 'FUNCIONARIO HONESTO';
                                    break;
                                case 4:
                                    $tipo = 'FUNCIONARIO DESONESTO';
                                    break;
                                case 5:
                                    $tipo = 'FUNCIONARIO PREGUICOSO';
                                    break;
                                case 6:
                                    $tipo = 'FUNCIONARIO COOPERATIVO';
                                    break;
                        
                            }
                            $htmlConteudo .= '<tr>
                                                                        <td>' . $tipo . '</td>
                                                                        <td>' . round(($t/$cont)*100, 2) . '%</td>
                                                                        </tr>';
                        }
                        
                        
                        $htmlConteudo .= '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    ';


$pagina = new Pagina('Página 3 - Dashboard');
//$pagina->setNomeUsuario();
$pagina->setConteudo($htmlConteudo);
$pagina->mostrar();
