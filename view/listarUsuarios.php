<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Listar Usuários</title>
        
        <!--link externos-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>
        

    </head>
    <body>
        <!--centralizando o conteudo-->
        <div class="container-fluid col-12 col-xl-10">
        <!--cabeçalho-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>
        
        <!--formulario para cadastrar usuario-->
        <div class="coreSiteUm">
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/cadastroUsuario.php';?>
        </div>
        
        <!--conteudo lista os usuarios-->
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';

            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->getAllUsuario();
//            var_dump($usuario);die();
            echo "<table class='table table-hover table-dark mt-10 centralizaTexto'>";
            echo "<tr>";
            echo "  <th>Login</th>";
            echo "  <th>Tipo da Conta</th>";
            echo "  <th>Nome</th>";
            echo "  <th>Pontuação</th>";
            echo "  <th>Nivel</th>";
            echo "  <th>Excluir</th>";
            echo "  <th>Alterar</th>";
            echo "</tr>";

            foreach ($usuario as $c) {
                echo "<tr>";
                echo "  <td>{$c["login"]}</td>";
                
                echo "  <td>{$c["descricao"]}</td>";
                    
                echo "  <td>{$c["nome"]}</td>";
                echo "  <td>{$c["pontuacao"]}</td>";
                echo "  <td>{$c["level"]}</td>";
//                echo "  <td><a href='/ProjetoFinal/controller/excluirUsuarioController.php?id={$c["login"]}&tipo=1'>Excluir</a></td>";
        ?>
        <td><a onclick="excluirUsuario('<?=$c["login"]?>','1')" ><i class='fas fa-trash-alt cursor'></i></a></td>
        <?php
                echo "  <td><a href='/ProjetoFinal/view/alterarCadastro.php?id={$c["login"]}'><i class='far fa-edit'></i></a></td>";
                echo "</tr>";
            }

            echo "</table>";
        ?>
        
        
        
        
        <!--footer-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?> 

        </div> 
    </body>
</html>