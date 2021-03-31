<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/cadastrarUsuarioDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AmigoDAO.php';

$amigoLogin = $_GET['idamigo'];
$nomeAmigo = $_GET['nomeAmigo'];
$meuLogin = $_GET['idmeu'];
$meuNome = $_GET['nomeUsuario'];

$usuarioDTO = new cadastrarUsuarioDTO();

$usuarioDTO->setLogin($meuLogin);
$usuarioDTO->setAmigoLogin($amigoLogin);
$usuarioDTO->setAmigoNome($nomeAmigo);
$usuarioDTO->setNome($meuNome);


$amigoDAO = new AmigoDAO();
//adiciona um amigo no usuario
$sucesso = $amigoDAO->adicionaAmigo($usuarioDTO);

if ($sucesso){
    
//    adiciona o amigo no amigo
    $sucessoDois = $amigoDAO->adicionaAmigoDois($usuarioDTO);
    
    if ($sucessoDois){
    
        require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php';

        echo '<div class="alert alert-warning alert-dismissible fade show zindex" role="alert">';
        echo 'Amigo adicionado com sucesso!';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
}



