<?php
//session iniciada para poder deslogar o usuario quando se exclui a conta
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AmigoDAO.php';

$idUsuario = $_GET["id"];

$usuarioDAO = new UsuarioDAO();
$usuarioDAO->excluirUsuario($idUsuario);

//exclui o usuario de todas as litas de amigos
$amigoDAO = new AmigoDAO();
$amigoDAO->excluirDaListaAmigo($idUsuario);



//tipo 0 usuario logado - tipo 1 adm listar usuarios
if ($_GET["tipo"] == 0){
    session_destroy();
    $msg = "Usuário Excluido com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";
    echo "</script> ";
}else{
    $msg = "Usuário Excluido com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/view/listarUsuarios.php?msg={$msg}';";
    echo "</script> ";
}
