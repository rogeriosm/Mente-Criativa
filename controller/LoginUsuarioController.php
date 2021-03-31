<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/cadastrarUsuarioDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';


// recuperei os dados do formulario

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);
$tipoConta = $_POST['customRadioInline1'];


$usuarioDTO = new cadastrarUsuarioDTO();
$usuarioDTO->setLogin($usuario);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setTipoConta($tipoConta);


$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->salvarUsuario($usuarioDTO);

if ($sucesso){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";
    echo "</script> ";
    
}
