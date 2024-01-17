<?php

class Funcionarios
{
    public $funcionarios = [];
    public $indice = 0;

    public function __construct()
    {
        $x = 0;
        //cadastro geral de funcionários
        $this->funcionarios[] = new Funcionario($x++, 'Zé', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Mario Prata', K_FUNCIONARIO_ESPERTO);
        $this->funcionarios[] = new Funcionario($x++, 'João Souza', K_FUNCIONARIO_HONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Maria Ambrosia', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Carlos Santos', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Francisco da Cunha', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Godofredo Ansdruval', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Marcoleidson Froga', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Carmem de Sá', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Chica da Silva', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Francinaldo Andrades de Ló', K_FUNCIONARIO_DESONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Carmiro José', K_FUNCIONARIO_DESONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'José Maria', K_FUNCIONARIO_HONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Dinho', K_FUNCIONARIO_DESONESTO);

        //cadastro baseado no arquivo candidatos.dump
        $arquivo = $this->importaArquivo();

        foreach ($arquivo as $k => $a) {
            if (strpos($a, '#') !== 0 && $a != '') {
                $s = preg_split('/\t+/', $a);
                switch ($s[2]) {
                    case 'm':
                        $const = K_FUNCIONARIO_MOTIVADO;
                        break;
                    case 'e':
                        $const = K_FUNCIONARIO_ESPERTO;
                        break;
                    case 'd':
                        $const = K_FUNCIONARIO_DESONESTO;
                        break;
                    case 'p':
                        $const = K_FUNCIONARIO_PREGUICOSO;
                        break;
                    case 'c':
                        $const = K_FUNCIONARIO_COOPERATIVO;
                        break;
                    case 'h':
                        $const = K_FUNCIONARIO_HONESTO;
                        break;


                }
                $this->funcionarios[] = new Funcionario($x++, $s[1], $const);

            }


        }

        /*
# FUNCIONARIO_MOTIVADO -> m
# FUNCIONARIO_ESPERTO -> e
# FUNCIONARIO_HONESTO -> h
# FUNCIONARIO_DESONESTO -> d
# FUNCIONARIO_PREGUICOSO -> p
# FUNCIONARIO_COOPERATIVO -> c
*/
    }

    public function pegarFuncionario() //pega funcionários em geral
    {
        if (array_key_exists($this->indice, $this->funcionarios)) { // ajustado para pegar todos os funcionários corretamente
            return $this->funcionarios[$this->indice++];
        }
    }

    public function pegarFuncionarioPorId(int $id)//pega funcionários pelo id
    {
        return $this->funcionarios[$id];
    }

    public function importaArquivo() //importa candidatos do arquivo .dump
    {
        try {
            //$conteudo = file_get_contents('candidatos.dump');
            $conteudo = file('candidatos.dump', FILE_IGNORE_NEW_LINES);
            return $conteudo;
        } catch (Exception $e) {
            echo 'Erro ao importar';
        }

    }
}
