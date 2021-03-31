<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/MensagemDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/MensagemDTO.php';

    
$mensagem = $_POST['mensagem'];
$usuarioLogin = $_POST['usuario'];
$amigoLogin = $_POST['amigoLogin'];
$id_amigo = $_POST['id_amigo'];


if(!empty($mensagem)){
    $mensageiroDTO = new MensagemDTO();
    $mensageiroDTO->setMensagem($mensagem);
    $mensageiroDTO->setUsuarioLogin($usuarioLogin);
    $mensageiroDTO->setAmigoLogin($amigoLogin);
    $mensageiroDTO->setAmigoIdAmigo($id_amigo);


    $mensageiroDAO = new MensagemDAO();
    $sucesso = $mensageiroDAO->salvarMensagem($mensageiroDTO);
    if($sucesso){
        echo "<script>";
        echo "window.location.href = '/projetoFinal/view/mensageiro.php';";
        echo "</script> ";

    }
}











//nao remover para nao dar erro no html
?>