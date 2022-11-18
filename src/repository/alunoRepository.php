<?php

declare(strict_types=1);

function buscarAlunos(): iterable
{
    $sql = 'SELECT * FROM alunos ORDER BY matricula ASC';
    $alunos = abrirConexao()->query($sql);
    return $alunos;
}
function buscarUmAlunos($idalunos): iterable
{
    $sql = "SELECT * FROM alunos WHERE idalunos='{$idalunos}'";
    $aluno = abrirConexao()->query($sql);
    return $aluno->fetch(PDO::FETCH_ASSOC);
}
function novoAluno(string $matricula, string $nome, string $cidade): void
{
    //INSERT INTO
    $select = "INSERT INTO `alunos` (`matricula`, `nome`, `cidade`)  VALUES (?,?,?)";
    $query = abrirConexao()->prepare($select);
    $query->execute([$matricula, $nome, $cidade]);
}
function atualizarAluno(string $matricula, string $nome, string $cidade,string $idalunos): void
{
    $sql = "UPDATE alunos SET nome=?,matricula=?,cidade=? WHERE idalunos=?";
    $query = abrirConexao()->prepare($sql);
    $query->execute([$nome, $matricula, $cidade, $idalunos]);
    header('location: /listar');
}
function excluirAluno(string $idalunos): void
{
    $sql = "DELETE FROM alunos WHERE idalunos={$idalunos}";

    abrirConexao()->query($sql);
}