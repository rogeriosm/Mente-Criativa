<?php
class cadastrarUsuarioDTO {
    private $login;
    private $senha;
    private $nome;
    private $pontuacao;
    private $tipoConta;
    private $level;
    private $amigoLogin;
    private $amigoNome;
    private $tipoUsuario_id_tipoUsuario;

    public function getTipoUsuario_id_tipoUsuario() {
        return $this->tipoUsuario_id_tipoUsuario;
    }
     
    public function setTipoUsuario_id_tipoUsuario($tipoUsuario_id_tipoUsuario) {
        $this->tipoUsuario_id_tipoUsuario = $tipoUsuario_id_tipoUsuario;
    }
    
    function getAmigoNome() {
        return $this->amigoNome;
    }

    function setAmigoNome($amigoNome) {
        $this->amigoNome = $amigoNome;
    }

        function getAmigoLogin() {
        return $this->amigoLogin;
    }

    function setAmigoLogin($amigoLogin) {
        $this->amigoLogin = $amigoLogin;
    }

 

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNome() {
        return $this->nome;
    }

    function getPontuacao() {
        return $this->pontuacao;
    }

    function getTipoConta() {
        return $this->tipoConta;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPontuacao($pontuacao) {
        $this->pontuacao = $pontuacao;
    }

    function setTipoConta($tipoConta) {
        $this->tipoConta = $tipoConta;
    }
       
    function getLevel() {
        return $this->level;
    }

    function setLevel($level) {
        $this->level = $level;
    }

}
