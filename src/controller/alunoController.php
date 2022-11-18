<?php

//definindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function renderizar(string $nomedoArquivo,mixed $dados = null): void
{
    include '../src/views/header.php';
    include "../src/views/{$nomedoArquivo}.phtml";
    $dados;
    include '../src/views/footer.php';
}
function redirecionar(string $onde)
{
    header("location: {$onde}");
}
function inicio(): void //estamos declarando que essa funcao "nao tem retorno"
{
    renderizar("inicio");
}
function listar(): void
{
    //SELECT TODOS
    $alunos = buscarAlunos();
    renderizar("listar",$alunos);
}

function novo(): void
{
    renderizar("novo");
    if (!empty($_POST)) {
        $matricula = trim($_POST['matricula']);
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);

        if (validateForm($matricula, $nome, $cidade)) {
            novoAluno($matricula, $nome, $cidade);
            redirecionar('/listar');
        }
    }
}

function editar(): void
{
    $idalunos = $_GET["idalunos"];
    $aluno = buscarUmAlunos($idalunos);
    renderizar("editar",$aluno);
    if (!empty($_POST)) {
        $matricula = trim($_POST['matricula']);
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);

        if (validateForm($matricula, $nome, $cidade)) {
            atualizarAluno($matricula, $nome, $cidade,$idalunos);
            redirecionar('/listar');
        }
    }
}
function excluir()
{
    $idalunos = $_GET['idalunos']; //recuperando o id que tava na URL

    excluirAluno($idalunos); //pedindo ao repository pra excluir o aluno (nao sabemos como ele vai fazer)

    redirecionar('/listar');
}