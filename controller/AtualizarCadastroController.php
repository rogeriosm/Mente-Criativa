<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/cadastrarUsuarioDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';

// recupera os dados do formulario alterar cadastro
$usuario = $_POST["login"];
$nome = $_POST['nome'];
$pontuacao = $_POST['pontuacao'];
$tipoConta = $_POST['tipoConta'];
$level = $_POST['nivel'];

$usuarioDTO = new cadastrarUsuarioDTO();
$usuarioDTO->setLogin($usuario);
$usuarioDTO->setTipoConta($tipoConta);
$usuarioDTO->setNome($nome);
$usuarioDTO->setPontuacao($pontuacao);
$usuarioDTO->setlevel($level);

$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->alterarCadastro($usuarioDTO);

if ($sucesso){
   $msg = "Cadastro alterado com sucessso"; 
   echo "<script>";
   echo    "window.location.href = '/projetoFinal/view/listarUsuarios.php?msg={$msg}';";
   echo "</script> ";
}
