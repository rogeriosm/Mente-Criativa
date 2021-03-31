<?php
class MensagemDTO {
    private $id_mensagem;
    private $mensagem;
    // private $amigoIdAmigo;
    private $amigoLogin;
    private $usuarioLogin;
    
    function getId_mensagem() {
        return $this->id_mensagem;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getAmigoIdAmigo() {
        return $this->amigoIdAmigo;
    }

    function getAmigoLogin() {
        return $this->amigoLogin;
    }

    function getUsuarioLogin() {
        return $this->usuarioLogin;
    }

    function setId_mensagem($id_mensagem) {
        $this->id_mensagem = $id_mensagem;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setAmigoIdAmigo($amigoIdAmigo) {
        $this->amigoIdAmigo = $amigoIdAmigo;
    }

    function setAmigoLogin($amigoLogin) {
        $this->amigoLogin = $amigoLogin;
    }

    function setUsuarioLogin($usuarioLogin) {
        $this->usuarioLogin = $usuarioLogin;
    }




}
