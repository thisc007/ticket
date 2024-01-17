<?php

    include 'lib/Funcionarios.php';
    include 'lib/Empresa.php';
    include 'lib/Funcionario.php';
    include 'lib/Pagina.php';
    include 'lib/TicketAndGo.php';

    $funcionarios = new Funcionarios();
    $empresa = new lib\Empresa(1);
    $ticketngo = new lib\TicketAndGo(1);
    $conteudo = '';

    //adiciona funcionários a empresa.
    while ($funcionario = $funcionarios->pegarFuncionario()) {
        $ticketngo->addFuncionario($funcionario);
    }
    $arFuncionarios = $ticketngo->getFuncionarios();

    //gera a listagem, bom gerar função/método específico.
    $htmlConteudo = '';
    //print_r($arFuncionarios);
    $htmlConteudo = '
    <legend>TicketAndGo</legend>
    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <td>Ação</td>
                        </thead>
                        <tbody>';
    foreach ($arFuncionarios as $k => $funcionario) {

        switch($funcionario->getTipo())
        {
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
        $htmlConteudo .= "<tr>
            <td>". $k+1 . "</td>
            <td>" . $funcionario->getNome() . "</td>
            <td>" . $tipo . "</td>
            <td><a href='funcionario.php?id=" . $funcionario->getId() . "'>Ver Mais</a><td>
            </tr>";
    }
    $htmlConteudo .= "</tbody>
    </table>
    ";


    $pagina = new Pagina('Página 3 - Lista de Funcionários Ticket And Go');
    //$pagina->setNomeUsuario();
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
