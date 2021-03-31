<?php
//conexao com o banco de dados
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/conexao/conexao.php';

class MensagemDAO {
    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::conecta_db();
    }
    
    //salva as mensagens enviadas nos dois amigos
    public function salvarMensagem(MensagemDTO $mensagemDTO) {
        
        try{
            $sql = "insert into mensagem (mensagem, amigo_Login, usuario_login, amigo_id_amigo) values (?,?,?,?)";
            // var_dump($mensagemDTO);die();
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$mensagemDTO->getMensagem());
            $stmt->bindValue(2,$mensagemDTO->getAmigoLogin());
            $stmt->bindValue(3,$mensagemDTO->getUsuarioLogin());
            $stmt->bindValue(4,$mensagemDTO->getAmigoIdAmigo());
            return $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
//        try{
//            $sql = "insert into mensagem (mensagem,amigoLogin,usuarioLogin,amigo_id_amigo) values (?,?,?,?)";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1,$mensagemDTO->getMensagem());
//            $stmt->bindValue(2,$mensagemDTO->getUsuarioLogin());
//            $stmt->bindValue(3,$mensagemDTO->getAmigoLogin());
//            $stmt->bindValue(4,$mensagemDTO->getAmigoIdAmigo());
//            $stmt->execute();
//            
//        } catch (Exception $ex) {
//            echo $ex->getMessage();
//        }
        
    }
    
//    public function mostrarMensagensUsuario($usuario){
//        try{
//            $sql = "select id_mensagem, amigo_id_amigo, mensagem from mensagem where usuarioLogin = ?";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1,$usuario);
//            $stmt->execute();
//            $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            return $mensagens;
//        } catch (Exception $ex) {
//            echo $ex->getMessage();
//        }
//    }
//
//    public function mostrarMensagensAmigo($amigo){
//        try{
//            $sql = "select id_mensagem, mensagem from mensagem where usuarioLogin = ?";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1,$amigo);
//            $stmt->execute();
//            $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            return $mensagens;
//        } catch (Exception $ex) {
//            echo $ex->getMessage();
//        }
//    }
    
    
        public function mostrarTodasMensagens($amigo,$usuario){
        try{
//            $sql = "select mensagem, amigo_Login from mensagem "
//                    . "where usuario_Login = :u and amigo_Login = :a or "
//                    . "usuario_Login = :a and amigo_Login = :u order by id_mensagem";
            
            $sql = "select m.mensagem, m.amigo_login from mensagem m
            inner join usuario u on m.usuario_login = u.login
            inner join amigo a on m.amigo_id_amigo = a.id_amigo
            where m.usuario_login = :u and m.amigo_login = :a
            or m.usuario_login = :a and m.amigo_login = :u";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':u',$usuario);
            $stmt->bindValue(':a',$amigo);
            $stmt->execute();
            $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mensagens;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
