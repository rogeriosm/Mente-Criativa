<?php

//ver se e logar ou cadastrar
if(isset($_POST['criarConta']))
{ 
    //chama o LoginUsuarioController.php que controla o cadastro de usuario/instituição
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/controller/LoginUsuarioController.php';
}
else
{
    //chama loginController.php que controla o acesso ao site
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/controller/LoginController.php';
}