<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/conexao/conexao.php';

class alunoDAO {
    public $pdo = null;
//    chamando a conexao para dentro de pdo
    public function __construct() {
        $this->pdo = Conexao::conecta_db();
    }
    
//    cadastra o aluno no banco de dados
    public function salvarAluno(AlunoDTO $alunoDTO){
        try {
            
            $sql = "INSERT INTO aluno (nome, usuario_login) 
                    VALUES (?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alunoDTO->getNomeAluno());
            $stmt->bindValue(2, $alunoDTO->getUsuarioLogin());
            return $stmt->execute();
            
        } catch (PDOException $exc) {
            
            //mostra mensagem de erro dizendo que ja existe um usuario cadastrado
            //com o mesmo nome
            if($exc->getCode() == 23000){
                $msg = "Usuario Existente crie outro usuario"; 
                echo "<script>";
                echo "window.location.href = '/projetoFinal/index.php?msg={$msg}';";
                echo "</script> ";
            }
            else{
                echo $exc->getMessage();
            }
        }
    }
    
    
//    mostra os alunos cadastrados do usuario
    public function getAllAlunos($usuario){
        try{
            $sql = "select id_alunos, nome, pontuacao from aluno where usuario_login = ? order by nome";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $alunos;
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
//    exclui um aluno da instituição
    public function excluirAluno($idAluno){
        try{
            $sql = "delete from aluno where id_alunos = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$idAluno);
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
