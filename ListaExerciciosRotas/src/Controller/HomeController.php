<?php

namespace Php\Primeiroprojeto\Controller;

class HomeController
{
    public function ex1()
    {
        $numero = $_POST['numero'];

        if ($numero > 0) {
            $mensagem = 'Valor Positivo';
        } elseif ($numero == 0) {
            $mensagem = 'Valor Igual a Zero';
        } elseif ($numero < 0) {
            $mensagem = 'Valor Negativo';
        }

        require_once '..\src\View\exercicio1.php';
    }

    public function ex2()
    {
        for ($i = 1; $i <= 7; $i++) {
            $numeros[$i] = $_POST['numero' . $i];
        }
        if (in_array(null, $numeros)) {
            echo 'Verifique os dados e tente novamente (todos os números são obrigatórios)';
            exit();
        }
        $menorNumero = min($numeros);
        $posicao = array_search($menorNumero, $numeros);

        $mensagem = "O menor número é {$menorNumero} e sua posição na sequência de entrada é {$posicao}.";
        echo "<script>alert('{$mensagem}')</script>";
    }

    public function renderizaOExercicio2()
    {
        require_once '..\src\View\exercicio2.php';
    }
}