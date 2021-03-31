<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/conexao/conexao.php';

class LoginDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::conecta_db();
    }

    public function login($usuario,$senha) {
        try {

            $sql = "SELECT usuario.login, usuario.nome, usuario.pontuacao, usuario.level, tipousuario.descricao
            FROM usuario
            inner join tipousuario
            on  usuario.tipoUsuario_id_tipoUsuario = tipousuario.id_tipoUsuario
            WHERE usuario.login = ? and usuario.senha = ?";



            // $sql = "SELECT usuario.login, usuario.nome, usuario.pontuacao, usuario.level, tipousuario.descricao
            // FROM usuario
            // inner join tipousuario
            // on  usuario.tipoUsuario_id_tipoUsuario=tipousuario.id_tipoUsuario";





            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;

        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}

