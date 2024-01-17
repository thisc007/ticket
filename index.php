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
    $htmlConteudo = '<table class="table">
                        <thead>
                            <th>#</td>
                            <th>Nome</th>
                            <td>Ação</td>
                        </thead>
                        <tbody>';
    foreach ($arFuncionarios as $k => $funcionario) {
        $htmlConteudo .= "<tr>
            <td>". $k+1 . "</td>
            <td>" . $funcionario->getNome() . "</td>
            <td><a href='funcionario.php?id=" . $funcionario->getId() . "'>Ver Mais</a><td>
            </tr>";
    }
    $htmlConteudo .= "</tbody>
    </table>";


    $pagina = new Pagina('Página 1 - Lista de Funcionários Disponíveis');
    //$pagina->setNomeUsuario();
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
