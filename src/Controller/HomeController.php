<?php

namespace Php\Primeiroprojeto\Controller;

 class HomeController
{
    public function olaMundo() {
        return 'Olá Mundo';
    }

    public function formExe1($params) {
        require_once ('../src/View/exercicio1.html');
    }
}