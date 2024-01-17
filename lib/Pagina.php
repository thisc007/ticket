<?php

class Pagina
{
    public $nomeUsuario = 'THIAGO SOUSA CRUZ';
    public $tituloPagina;
    public $conteudo;


    public function __construct($tituloPagina)
    {
        $this->tituloPagina = $tituloPagina;
    }

    public function setNomeUsuario($nomeUsuario) //Armazena o nome do usuário para exibí-los
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setConteudo($conteudo) //pega os conteúdos das páginas
    {
        $this->conteudo = $conteudo;
    }

    public function mostrar() //exibição do HTML das páginas
    {
        $stHtml = "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" >
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
        <body class='bg-gradient-primary'>

    <div class='container-fluid'>
        <div style=' width:100%; text-align:center; height:80px; margin:0'>
				<h3 >TESTE DE ADMISSÃO DE " . $this->nomeUsuario . '</h3><h5>' . $this->tituloPagina . '</h5>
            </div>
              <div class="row">
              <div class="col-lg-12"> 
			';
        $stHtml .= $this->conteudo;

        $stHtml .= " </div>
        </div>
        </div>
        <footer id='footer' style='position: fixed;
        bottom:5px; text-align:center; width: 100%;'><p><b>" . date("d/m/Y H:i") . "</b></p></footer>
      </div>
     </body>"; //fixando rodapé embaixo
        echo $stHtml;
    }
}
