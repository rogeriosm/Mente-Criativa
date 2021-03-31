<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/cadastrarUsuarioDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';


// recuperei os dados do formulario

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);
$nome = $_POST["nome"];
$tipoConta = $_POST['customRadioInline1'];



$usuarioDTO = new cadastrarUsuarioDTO();
$usuarioDTO->setLogin($usuario);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setNome($nome);
$usuarioDTO->setTipoConta($tipoConta);


$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->criarUsuario($usuarioDTO);

if ($sucesso){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/view/listarUsuarios.php?msg={$msg}';";
    echo "</script> ";
}
