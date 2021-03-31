<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AlunoDAO.php';

    $id_aluno = $_GET["id"];

    $alunoDAO = new AlunoDAO();
    $alunoDAO->excluirAluno($id_aluno);

    $msg = "Aluno Excluido com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";
    echo "</script> ";
