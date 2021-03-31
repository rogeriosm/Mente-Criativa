<?php
//conexao com o banco de dados
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/conexao/conexao.php';


class AmigoDAO {
    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::conecta_db();
    }
    
    //exclui amigos da tabela amigos
    public function excluirAmigo($amigoLogin,$loginUsuario){
        
        try{
            $sql = "delete from amigo where amigo_login = ? and usuario_login = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$amigoLogin);
            $stmt->bindValue(2,$loginUsuario);
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

    }
    
    //me exclui da lista do meu amigo
    public function excluirAmigoDois($amigoLogin,$loginUsuario){
        try{
            $sql = "delete from amigo where amigo_login = ? and usuario_login = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$loginUsuario);
            $stmt->bindValue(2,$amigoLogin);
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

    }
    
//    excluir usuario de todas as listas de amigos
        public function excluirDaListaAmigo($loginUsuario){
        try{
            $sql = "delete from amigo where amigo_login = ? or usuario_login = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$loginUsuario);
            $stmt->bindValue(2,$loginUsuario);
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

    }
    
//adicionando amigos
    public function adicionaAmigo(cadastrarUsuarioDTO $usuarioDTO){
        try{
            $sql = "INSERT INTO amigo (amigo_login, usuario_login, nomeAmigo) 
                        VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getAmigoLogin());
            $stmt->bindValue(2, $usuarioDTO->getLogin());
            $stmt->bindValue(3, $usuarioDTO->getAmigoNome());
            return $stmt->execute();
            
            
            
            
            
        } catch (Exception $ex) {
            //mostra mensagem de erro dizendo que ja existe um usuario cadastrado
            //com o mesmo nome
            echo $ex->getMessage();
        }
    }
    
    //adicionando amigos no amigo
    public function adicionaAmigoDois(cadastrarUsuarioDTO $usuarioDTO){
        try{
            $sql = "INSERT INTO amigo (amigo_login, usuario_login, nomeAmigo) 
                        VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getLogin());
            $stmt->bindValue(2, $usuarioDTO->getAmigoLogin());
            $stmt->bindValue(3, $usuarioDTO->getNome());
            return $stmt->execute();
            
        } catch (Exception $ex) {
            //mostra mensagem de erro dizendo que ja existe um usuario cadastrado
            //com o mesmo nome
            echo $ex->getMessage();
            
        }
    }
    
//    mostra lista de amigos do usuario
    //    mostra os alunos cadastrados do usuario
    public function getAllAmigos($usuario){
        try{
            $sql = "select amigo_login, nomeAmigo, id_amigo from amigo where usuario_login = ? order by nomeAmigo";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $alunos;
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    




//    atualiza o nome da tabela amigo
    public function atualizaNome(cadastrarUsuarioDTO $usuarioDTO){
        try{
            $sql = "update amigo set nomeAmigo = ? where amigo_login = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getNome());
            $stmt->bindValue(2,$usuarioDTO->getLogin());
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
    }
    
}
