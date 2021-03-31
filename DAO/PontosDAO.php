<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/conexao/conexao.php';

class PontosDAO {
    public $pdo = null;
    //chamando a conexao para dentro de pdo
    public function __construct() {
        $this->pdo = Conexao::conecta_db();
    }
    
    public function pegaPontuacaoUsuario(PontosDTO $pontosDTO){
        
        try{
            $sql = "select pontuacao,level from usuario where login = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1 ,$pontosDTO->getId());
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
            
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    public function pegaPontuacaoAluno(PontosDTO $pontosDTO){
        try{
            $sql = "select pontuacao from aluno where id_alunos = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1 , $pontosDTO->getLevel_idAluno());
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
            
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    public function salvaPontuacaoAluno(PontosDTO $pontosDTO) {
        try{
            $sql = "UPDATE `aluno` SET `pontuacao` = ? WHERE (`id_alunos` = ?);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1 , $pontosDTO->getNovoValor());
            $stmt->bindValue(2 , $pontosDTO->getLevel_idAluno());
            return $stmt->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    public function salvaPontuacaoUsuario(PontosDTO $pontosDTO) {
        try{
            $sql = "UPDATE `usuario` SET `pontuacao` = ? WHERE (`login` = ?);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1 , $pontosDTO->getNovoValor());
            $stmt->bindValue(2 , $pontosDTO->getId());
            return $stmt->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    public function zeraPontos(PontosDTO $pontosDTO) {
        try{
            $sql = "UPDATE `usuario` SET `pontuacao` = ? WHERE (`login` = ?);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1 , $pontosDTO->getNovoValor());
            $stmt->bindValue(2 , $pontosDTO->getId());
            return $stmt->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
}
