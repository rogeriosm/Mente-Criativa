<?php

class AlunoDTO {
    private $usuarioLogin;
    private $nomeAluno;

    function getUsuarioLogin() {
        return $this->usuarioLogin;
    }

    function getNomeAluno() {
        return $this->nomeAluno;
    }

    function setUsuarioLogin($usuarioLogin) {
        $this->usuarioLogin = $usuarioLogin;
    }

    function setNomeAluno($nomeAluno) {
        $this->nomeAluno = $nomeAluno;
    }


}
