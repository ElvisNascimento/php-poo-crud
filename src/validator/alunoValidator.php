<?php

declare(strict_types=1);

function validateForm(string $matricula,string $nome,string $cidade): bool
{
    if (strlen($matricula) < 3) {

        $mensagem = 'matricula invalida';
        include '../src/views/components/erro.phtml';
        return false;
    }

    if (strlen($nome) < 3) {

        $mensagem = 'nome invalido';
        include '../src/views/components/erro.phtml';
        return false;
    }

    if (strlen($cidade) < 3) {

        $mensagem = 'cidade invalida';
        include '../src/views/components/erro.phtml';
        return false;
    }
    return true;
}