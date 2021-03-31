<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/conexao/conexao.php';

class UsuarioDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::conecta_db();
    }

    public function getAllUsuario() {
        try {
            // $this->pdo->beginTransaction();
            // $usuario = $this->pdo->query("SELECT usuario.login, usuario.nome, usuario.pontuacao, usuario.level, tipousuario.tipoConta
            // FROM usuario, tipousuario");
            // $this->pdo->commit();
            
            // return $usuario;
            
            
            
            
           $sql = "SELECT usuario.*,tipousuario.descricao
           FROM usuario
           inner join tipousuario
           on  usuario.tipoUsuario_id_tipoUsuario=tipousuario.id_tipoUsuario
           order by nome";

           $stmt = $this->pdo->prepare($sql);
           $stmt->execute();
           $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $usuarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
//    funcao para criar usuario na tela login
    public function salvarUsuario(cadastrarUsuarioDTO $usuarioDTO) {
        
        try {            
            $login= $usuarioDTO->getLogin();
            $senha = $usuarioDTO->getSenha();
            $tipoConta = $usuarioDTO->getTipoConta();

            $sql = "INSERT INTO usuario (login,senha,tipousuario_id_tipousuario)
            VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getLogin());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->bindValue(3, $usuarioDTO->getTipoConta());
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
                echo 'erro de conexao com banco de dados '.$exc->getMessage();
            }
        }
    }
    
//    funcao para criar usuario na tela listar usuarios
        public function criarUsuario(cadastrarUsuarioDTO $usuarioDTO) {
        try {
            
                $login= $usuarioDTO->getLogin();
                $senha = $usuarioDTO->getSenha();
                $tipoConta = $usuarioDTO->getTipoConta();
                $nome = $usuarioDTO->getNome();
                
                $this->pdo->beginTransaction();
                $usuario = $this->pdo->query("INSERT INTO usuario (login,senha,nome,tipousuario_id_tipousuario) VALUES ('$login','$senha','$nome',$tipoConta)");
                 
                return $this->pdo->commit();
//                
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//                $sql = "INSERT INTO usuario (login,senha,tipoConta, nome) 
//                        VALUES (?,?,?,?)";
//                $stmt = $this->pdo->prepare($sql);
//                $stmt->bindValue(1, $usuarioDTO->getLogin());
//                $stmt->bindValue(2, $usuarioDTO->getSenha());
//                $stmt->bindValue(3, $usuarioDTO->getTipoConta());
//                $stmt->bindValue(4, $usuarioDTO->getNome());
//                return $stmt->execute();
            
        } catch (PDOException $exc) {
            
            //mostra mensagem de erro dizendo que ja existe um usuario cadastrado
            //com o mesmo nome
            if($exc->getCode() == 23000){
                $msg = "Usuario Existente crie outro usuario"; 
                echo "<script>";
                echo "window.location.href = '/projetoFinal/view/listarUsuarios.php?msg={$msg}';";
                echo "</script> ";
            }
            else{
                echo $exc->getMessage();
            }
        }
    }
    

    public function excluirUsuario($idusuario) {
        try {
            $sql = "DELETE FROM usuario 
                   WHERE login = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getUsuarioById($idusuario) {
        try {
            $sql = "SELECT usuario.login, usuario.nome, usuario.pontuacao, usuario.level,usuario.tipousuario_id_tipoUsuario, tipousuario.descricao
            FROM usuario
            inner join tipousuario
            on  usuario.tipoUsuario_id_tipoUsuario = tipousuario.id_tipoUsuario
            WHERE usuario.login = ?";


            //$sql = "SELECT * FROM usuario,tipousuario WHERE usuario.login = :n and usuario_login = :n";


            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

//usando atualiza o nome
    public function atualizarNome(cadastrarUsuarioDTO $usuarioDTO) {

        try {
            $sql = "UPDATE usuario SET nome=?
                    WHERE login= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getLogin());
            return $stmt->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
//usando atualiza a senha
    public function atualizarSenha(cadastrarUsuarioDTO $usuarioDTO) {
        try {
            
            $sql = "UPDATE usuario SET senha=?
                    WHERE login= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getSenha());
            $stmt->bindValue(2, $usuarioDTO->getLogin());
            return $stmt->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
//    USANDO
    public function consultarPontuacao($login){
        try {

            $sql = "SELECT pontuacao, level, nome FROM usuario WHERE login=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $login);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
//USANDO altera o nome do usuario e amigo============================================
    public function alterarCadastro(cadastrarUsuarioDTO $usuarioDTO) {
        require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AmigoDAO.php';
        
        //atualiza o nome na lista de amigos tbm
        $amigoDao = new AmigoDAO();
        $amigoDao->atualizaNome($usuarioDTO);
        
        try {
            
            $login= $usuarioDTO->getLogin();
            $level = $usuarioDTO->getLevel();
            $nome = $usuarioDTO->getNome();
            $pontuacao = $usuarioDTO->getPontuacao();
            $tipoConta = $usuarioDTO->getTipoConta();

            if($tipoConta == "administrador"){
                $id_tipoUsuario = 1;
            }else if($tipoConta == "instituição" or $tipoConta == "instituicao"){
                $id_tipoUsuario = 2;
            }else{
                $id_tipoUsuario = 3;
            }
                
           
           $sql = "update usuario set nome = ?, pontuacao = ?,tipoUsuario_id_tipoUsuario = ?, level = ? where login = ?";
           $stmt = $this->pdo->prepare($sql);
           $stmt->bindValue(1, $usuarioDTO->getNome());
           $stmt->bindValue(2, $usuarioDTO->getPontuacao());
           $stmt->bindValue(3, $id_tipoUsuario);
           $stmt->bindValue(4, $usuarioDTO->getLevel());
           $stmt->bindValue(5, $usuarioDTO->getLogin());
           
           return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
//mostra os usuarios com o mesmo nome digitado==================================================
    public function pesquisarUsuario(cadastrarUsuarioDTO $usuarioDTO){
        try{
            $sql = "select  login, nome, tipousuario_id_tipoUsuario from usuario where nome like '%{$usuarioDTO->getNome()}%' or login like '%{$usuarioDTO->getNome()}%' order by nome";
            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1, $usuarioDTO->getNome());
//            $stmt->bindValue(2, $usuarioDTO->getNome());
            
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    //sobe o usuario de level
    public function sobeLevel(PontosDTO $pontosDTO) {
        try{
            $sql = "UPDATE `usuario` SET `level` = ? WHERE (`login` = ?);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1 , $pontosDTO->getLevel_idAluno());
            $stmt->bindValue(2 , $pontosDTO->getId());
            return $stmt->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    
    public function primeiros(){
        try{
            $sql ="select nome,tipousuario_id_tipoUsuario,level from usuario order by level desc";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $primeiros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $primeiros;
            
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
}
