<?php

    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/loginDAO.php';

    $login = $_POST["usuario"];
    $senha = md5($_POST["senha"]);
    
    $loginDAO = new LoginDAO();
    $usuario = $loginDAO->login($login, $senha);

    
    //passando dados pelo session
    if (!empty($usuario)) {
        
        $_SESSION["login"] = $usuario["login"];
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["tipoConta"] = $usuario["descricao"];
        $_SESSION["pontuacao"] = $usuario["pontuacao"];
        $_SESSION["level"] = $usuario["level"];
        
        echo "<script>";
        echo "window.location.href = '/projetoFinal/index.php';";
        echo "</script> ";
    } else {
        $msg = "Usuário e/ou senha invalido";
        echo "<script>";
        echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";//passando erro por GET
        echo "</script> ";

    }
