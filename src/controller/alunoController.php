<?php 

//definindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function inicio (): void //estamos declarando que essa funcao "nao tem retorno"
{
    include '../src/views/inicio.phtml';
}

function listar (): void 
{
    //SELECT TODOS
    $alunos =buscarAlunos();
    include '../src/views/listar.phtml';
}

function novo (): void 
{
    include '../src/views/novo.phtml';
    novoAluno();
}

function editar (): void
{
    $idalunos = $_GET["idalunos"];
    $aluno = buscarUmAlunos($idalunos);
    atualizarAluno();
    include '../src/views/editar.phtml';
}
function excluir ()
{
    $idalunos = $_GET['idalunos']; //recuperando o id que tava na URL

    excluirAluno($idalunos);//pedindo ao repository pra excluir o aluno (nao sabemos como ele vai fazer)
    
    header('location: /listar');
}