<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AmigoDAO.php';

    $amigoLogin = $_GET["idamigo"];
    $loginUsuario = $_GET["idminha"];

    $amigoDAO = new AmigoDAO();
    //exclui amigos da tabela amigos
    $amigoDAO->excluirAmigo($amigoLogin, $loginUsuario);
    
    //me exclui da lista do meu amigo
    $amigoDAO->excluirAmigoDois($amigoLogin, $loginUsuario);
    
    $msg = "Amigo Excluido com sucesso";
    echo "<script>";
    echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";
    echo "</script> ";