<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/AlunoDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AlunoDAO.php';

// recuperei os dados do formulario

$aluno = $_GET["aluno"];
$usuarioLogin = $_GET["login"];


$alunoDTO = new AlunoDTO();
$alunoDTO->setUsuarioLogin($usuarioLogin);
$alunoDTO->setNomeAluno($aluno);


$alunoDAO = new AlunoDAO();
$sucesso = $alunoDAO->salvarAluno($alunoDTO);

if ($sucesso){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";
    echo "</script> ";
}
