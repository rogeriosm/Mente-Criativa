<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/cadastrarUsuarioDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AmigoDAO.php';

// recupera os dados do formulario alterar cadastro


if(isset($_POST['alterarNome'])){
    $usuario = $_POST["login"];
    $nome = $_POST['nome'];
    
    $usuarioDTO = new cadastrarUsuarioDTO();
    $usuarioDTO->setLogin($usuario);
    $usuarioDTO->setNome($nome);

    $usuarioDAO = new UsuarioDAO();
    $sucesso = $usuarioDAO->atualizarNome($usuarioDTO);
    
//    atualiza o nome na lista de amigos tbm
    $amigoDao = new AmigoDAO();
    $amigoDao->atualizaNome($usuarioDTO);

    if ($sucesso){
        $msg = "Cadastro alterado com sucessso"; 
        echo "<script>";
        echo    "window.location.href = '/projetoFinal/view/atualizarPerfil.php?msg={$msg}';";
        echo "</script> ";
     }
}







if(isset($_POST['alterarSenhaCadastro'])){
    $usuario = $_POST["login"];
    $senha = md5($_POST["senha"]);
        
    $usuarioDTO = new cadastrarUsuarioDTO();
    $usuarioDTO->setLogin($usuario);
    $usuarioDTO->setSenha($senha);

    $usuarioDAO = new UsuarioDAO();
    $sucesso = $usuarioDAO->atualizarSenha($usuarioDTO);
    
    if ($sucesso){
        $msg = "Cadastro alterado com sucessso"; 
        echo "<script>";
        echo    "window.location.href = '/projetoFinal/view/listarUsuarios.php?msg={$msg}';";
        echo "</script> ";
    }
     
}else if(isset($_POST['alterarSenha'])){
    $usuario = $_POST["login"];
    $senha = md5($_POST["senha"]);
        
    $usuarioDTO = new cadastrarUsuarioDTO();
    $usuarioDTO->setLogin($usuario);
    $usuarioDTO->setSenha($senha);

    $usuarioDAO = new UsuarioDAO();
    $sucesso = $usuarioDAO->atualizarSenha($usuarioDTO);
    
    if ($sucesso){
        $msg = "Cadastro alterado com sucessso"; 
        echo "<script>";
        echo    "window.location.href = '/projetoFinal/view/atualizarPerfil.php?msg={$msg}';";
        echo "</script> ";
    }
     
}
