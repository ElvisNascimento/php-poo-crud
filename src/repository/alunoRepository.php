<?php

declare(strict_types=1);

function buscarAlunos(): iterable
{
    $sql = 'SELECT * FROM alunos';
    $alunos = abrirConexao()->query($sql);
    return $alunos;
}
function buscarUmAlunos($idalunos): iterable
{
    $sql = "SELECT * FROM alunos WHERE idalunos='{$idalunos}'";
    $aluno = abrirConexao()->query($sql);
    return $aluno->fetch(PDO::FETCH_ASSOC);
}
function novoAluno(): void
{
    //INSERT INTO
    if (false === empty($_POST)) {
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];

        $select = "INSERT INTO `alunos` (`matricula`, `nome`, `cidade`)  VALUES (?,?,?)";
        $query = abrirConexao()->prepare($select);
        $query->execute([$matricula, $nome, $cidade]);
        header('location: /listar');
    }
}
function atualizarAluno():void
{
    if (false === empty($_POST)) {
        $idalunos = $_POST['idalunos'];
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];

        $sql = "UPDATE alunos SET nome=?,matricula=?,cidade=? WHERE idalunos=?";
        $query = abrirConexao()->prepare($sql);
        $query->execute([$nome,$matricula, $cidade,$idalunos]);
        header('location: /listar');
    }

}
function excluirAluno(string $idalunos): void
{
    $sql = "DELETE FROM alunos WHERE idalunos={$idalunos}";

    abrirConexao()->query($sql);
}