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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            for ($i = 1; $i <= 7; $i++) {
                $numeros[$i] = $_POST['numero' . $i];
            }
            if (in_array(null, $numeros)) {
                echo "<script>alert('Verifique os dados e tente novamente (todos os números são obrigatórios)')</script>";
                exit();
            }
            $menorNumero = min($numeros);
            $posicao = array_search($menorNumero, $numeros);

            $mensagem = "O menor número é {$menorNumero} e sua posição na sequência de entrada é {$posicao}.";
        }
        require_once '..\src\View\exercicio2.php';
    }

    public function ex3() {
        $valor1 = $_POST['valor1'];
        $valor2 = $_POST['valor2'];

        if($valor1 === $valor2) {
            $somaValores = $valor1 + $valor2;
            $multiplicacao = $somaValores * 3;

            echo "<script>alert('Resultado da soma é: {$multiplicacao}')</script>";
        } else {
            $somaValores = $valor1 + $valor2;
            echo "<script>alert('Resultado da soma é: {$somaValores}')</script>";
        }

        require_once '..\src\View\exercicio3.php';
    }

    public function ex4() {
        require_once '..\src\View\exercicio4.php';
        $numero = $_POST['numero'];

        echo "
            <script>
                const tabuada = document.getElementById('tabuada');
                let conteudo = '';
            ";

        for($i = 0; $i <=10; $i++) {
            echo "conteudo += '{$numero} x {$i} = " . ($numero * $i) . "<br>';";
        }

        echo "
                tabuada.innerHTML = conteudo;
            </script>
            ";
    }


}