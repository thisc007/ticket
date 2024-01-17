<?php

/**
 *Mostra todos os dados do funcionário de acordo com o id recebido por get.
 *Deve mostrar o nome do usuário que está fazendo o teste, como registrado na sessão.
 *Deve conter um link que volta para a listagem.
 */
include 'lib/Funcionarios.php';
include 'lib/Funcionario.php';
include 'lib/Empresa.php';
include 'lib/Pagina.php';

$pagina = new Pagina('Página 2 - Funcionário');
//$pagina->setNomeUsuario();

$funcionario = new Funcionarios();
$dados = $funcionario->pegarFuncionarioPorId($_GET['id']);

$htmlConteudo = '<legend>' . $dados->getNome() . '</legend>';
$htmlConteudo .= '<p>TIPO: ';
switch ($dados->getTipo()) {
    case 1:
        $htmlConteudo .= 'FUNCIONARIO MOTIVADO';
        break;
    case 2:
        $htmlConteudo .= 'FUNCIONARIO ESPERTO';
        break;
    case 3:
        $htmlConteudo .= 'FUNCIONARIO HONESTO';
        break;
    case 4:
        $htmlConteudo .= 'FUNCIONARIO DESONESTO';
        break;
    case 5:
        $htmlConteudo .= 'FUNCIONARIO PREGUICOSO';
        break;
    case 6:
        $htmlConteudo .= 'FUNCIONARIO COOPERATIVO';
        break;
    

}
$htmlConteudo .= '</p>';
$pagina->setConteudo($htmlConteudo);
$pagina->mostrar();
