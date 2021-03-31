<?php
class PontosDTO {
    private $pontos;
    private $id; 
    private $pontuacao; 
    private $level_idAluno; 
    private $quemE;
    private $novoValor;
            
    function getNovoValor() {
        return $this->novoValor;
    }

    function setNovoValor($novoValor) {
        $this->novoValor = $novoValor;
    }
    
    function getPontos() {
        return $this->pontos;
    }

    function getId() {
        return $this->id;
    }

    function getPontuacao() {
        return $this->pontuacao;
    }

    function getLevel_idAluno() {
        return $this->level_idAluno;
    }

    function getQuemE() {
        return $this->quemE;
    }

    function setPontos($pontos) {
        $this->pontos = $pontos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPontuacao($pontuacao) {
        $this->pontuacao = $pontuacao;
    }

    function setLevel_idAluno($level_idAluno) {
        $this->level_idAluno = $level_idAluno;
    }

    function setQuemE($quemE) {
        $this->quemE = $quemE;
    }


}
