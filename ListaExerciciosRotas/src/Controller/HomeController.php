<?php

namespace Php\Primeiroprojeto\Controller;

class HomeController
{
    public function ex1()
    {
        $numero = isset($_POST['numero']) && is_numeric($_POST['numero']) ? $_POST['numero'] : null;

        if ($numero !== null) {
            if ($numero > 0) {
                $mensagem = 'Valor Positivo';
            } elseif ($numero == 0) {
                $mensagem = 'Valor Igual a Zero';
            } elseif ($numero < 0) {
                $mensagem = 'Valor Negativo';
            }
            echo "<script>alert('$mensagem')</script>";
        } else {
            echo "<script>alert('Preencha os campos do número corretamente.')</script>";
        }

        require_once '..\src\View\exercicio1.php';
    }

    public function ex2()
    {
        require_once '..\src\View\exercicio2.php';

        $numeros = [];
        $menorNumero = null;
        $posicoes = [];

        for ($i = 1; $i <= 7; $i++) {
            $numeros[$i] = isset($_POST['numero' . $i]) && is_numeric($_POST['numero' . $i]) ? $_POST['numero'. $i] : null;
        }

        foreach ($numeros as $numero) {
            if ($numero !== null) {
                if ($menorNumero === null || $numero < $menorNumero) {
                    $menorNumero = $numero;
                }
            }
        }

        foreach ($numeros as $key => $numero) {
            if ($numero === $menorNumero) {
                $posicoes[] = $key;
            }
        }

        if ($posicoes) {
            $textoPosicoes = implode(', ', $posicoes);
            echo "<script>alert('O menor número é $menorNumero e sua(s) posição(ões) na sequência de entrada é(são): $textoPosicoes.')</script>";
        } else {
            echo "<script>alert('O menor número não foi encontrado.')</script>";
        }
    }

    public function ex3() {
        $valor1 = isset($_POST['valor1']) && is_numeric($_POST['valor1']) ? $_POST['valor1'] : null;
        $valor2 = isset($_POST['valor2']) && is_numeric($_POST['valor2']) ? $_POST['valor2'] : null;

        if ($valor1 !== null && $valor2 !== null) {
            $somaValores = $valor1 + $valor2;
            if($valor1 === $valor2) {
                $multiplicacao = $somaValores * 3;

                echo "<script>alert('Resultado da soma é: $multiplicacao')</script>";
            } else {
                echo "<script>alert('Resultado da soma é: $somaValores')</script>";
            }
        } else {
            echo "<script>alert('Preencha os campos de valores corretamente.')</script>";
        }



        require_once '..\src\View\exercicio3.php';
    }

    public function ex4() {
        require_once '..\src\View\exercicio4.php';

        $numero = isset($_POST['numero']) && is_numeric($_POST['numero']) ? $_POST['numero'] : null;

        if ($numero !== null) {
            echo "
            <script>
                const tabuada = document.getElementById('tabuada');
                let conteudo = '';
            ";

            for($i = 0; $i <=10; $i++) {
                echo "conteudo += '$numero x {$i} = " . ($numero * $i) . "<br>';";
            }

            echo "
                tabuada.innerHTML = conteudo;
            </script>
            ";
        } else {
            echo "<script>alert('Preencha o campo de número corretamente.')</script>";
        }
    }

    public function ex5() {
        $numero = isset($_POST['numero']) && is_numeric($_POST['numero']) ? $_POST['numero'] : null;

        if ($numero !== null) {
            $fatorial = ($numero * 2) * 1;

            echo "<script>alert('O fatorial do número $numero é $fatorial')</script>";
        } else {
            echo "<script>alert('Preencha o campo de número corretamente.')</script>";
        }


        require_once '..\src\View\exercicio5.php';
    }

    public function ex6() {
        $valorA = isset($_POST['valorA']) && is_numeric($_POST['valorA']) ? $_POST['valorA'] : null;
        $valorB = isset($_POST['valorB']) && is_numeric($_POST['valorB']) ? $_POST['valorB'] : null;

        if ($valorA !== null && $valorB !== null) {
            if ($valorA == $valorB) {
                echo "<script>alert('Números iguais: $valorA')</script>";
            } elseif ($valorA < $valorB) {
                echo "<script>alert('$valorA $valorB')</script>";
            } else {
                echo "<script>alert('$valorB $valorA')</script>";
            }
        } else {
            echo "<script>alert('Preencha os campos dos valores de A e B corretamente.')</script>";
        }


        require_once '..\src\View\exercicio6.php';
    }

    public function ex7() {
        $valor = isset($_POST['valor']) && is_numeric($_POST['valor']) ? $_POST['valor'] : null;

        if ($valor !== null) {
            $conversao = $valor * 100;

            echo "<script>alert('$valor metros equivale a $conversao centímetros.')</script>";
        } else {
            echo "<script>alert('Preencha o campo de valor corretamente.')</script>";
        }

        require_once '..\src\View\exercicio7.php';
    }

    public function ex8() {
        $area = isset($_POST['tamanho']) && is_numeric($_POST['tamanho']) ? $_POST['tamanho'] : null;
        if ($area !== null) {
            $litros = $area / 3;
            $lata = ceil($litros / 18);;
            $valor = $lata * 80;

            echo "
            <script>
                alert('Você precisará de $lata latas de tinta.\\n' +
                'O preço total será de: R$ $valor')
            </script>";
        } else {
            echo "<script>alert('Preencha o campo de área em metros quadrados corretamente.')</script>";
        }

        require_once '..\src\View\exercicio8.php';
    }

    public function ex9() {
        $anoNascimento = isset($_POST['ano']) && is_numeric($_POST['ano']) ? $_POST['ano'] : null;

        if ($anoNascimento !== null){
            $anoAtual = 2024;
            $idade = $anoAtual - $anoNascimento;
            $dias = $idade * 365;
            $idade2025 = 2025 - $anoNascimento;

            echo "<script>alert('A idade atual desta pessoa é " . $idade . " anos.\\n" .
                "Esta pessoa já viveu " . $dias . " dias.\\n" .
                "Em 2025 a pessoa terá " . $idade2025 . " anos.')</script>";
        } else {
            echo "<script>alert('Preencha o campo do ano de nascimento corretamente.')</script>";
        }


        require_once '..\src\View\exercicio9.php';
    }

    public function ex10() {
        require_once '..\src\View\exercicio10.php';

        $peso = isset($_POST['peso']) && is_numeric($_POST['peso']) ? $_POST['peso'] : null;
        $altura = isset($_POST['altura']) && is_numeric($_POST['altura']) ? $_POST['altura'] : null;

        if ($peso !== null && $altura !== null) {
            $alturaEmMetros = $altura / 100; // Assume que a altura está em centímetros
            $imc = round($peso / ($alturaEmMetros * $alturaEmMetros), 1);

            if ($imc < 18.5) {
                echo "<script>alert('Seu IMC é de $imc e está classificado como Magreza')</script>";
            } elseif ($imc >= 18.5 && $imc <= 24.9) {
                echo "<script>alert('Seu IMC é de $imc e está classificado como Normal')</script>";
            } elseif ($imc >= 25 && $imc <= 29.9) {
                echo "<script>alert('Seu IMC é de $imc e está classificado como Sobrepeso')</script>";
            } elseif ($imc >= 30 && $imc <= 34.9) {
                echo "<script>alert('Seu IMC é de $imc e está classificado como Obesidade Grau I')</script>";
            } elseif ($imc >= 35 && $imc <= 39.9) {
                echo "<script>alert('Seu IMC é de $imc e está classificado como Obesidade Grau II')</script>";
            } else {
                echo "<script>alert('Seu IMC é de $imc e está classificado como Obesidade Grau III')</script>";
            }
        } else {
            echo "<script>alert('Preencha os campos peso e altura corretamente.')</script>";
        }
    }
}