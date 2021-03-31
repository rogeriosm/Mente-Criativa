<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Alterar cadastro</title>
        
        <!--link externos-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>
        
    </head>
    <body>
        
        <div class="container-fluid col-12 col-xl-10">
        
            <!--cabeçalho-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>

            <!--chamando a classe usuario para pegar os dados do usuario-->
            <?php 
                require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php'; 

                $idusuario = $_GET["id"];
                $usuarioDAO = new UsuarioDAO();
                $usuario = $usuarioDAO->getUsuarioById($idusuario);
            ?>

            <hr>
            <!--formulario para modificar os dados do usuario se necessario-->
            <form name="alterarCadastro" action="/projetoFinal/controller/AtualizarCadastroController.php" method="POST">
                <!--mostra o login do usuario-->
                <div class="form-group">
                    <label for="login">Login: </label>
                    <input type="text" class="form-control" id="login" aria-describedby="loginHelp" name="login" size="50" value="<?php echo $usuario["login"]?>" Readonly>
                    <small id="loginHelp" class="form-text text-muted">Esse campo não pode ser modificado!</small>
                </div>
                <!--mostra o nome atual do usuario-->
                <div class="form-group">
                    <label for="nome">Nome: </label>
                    <input type="text" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Escreva seu Nome..." name="nome" size="50" value="<?php echo $usuario["nome"]?>" required>
                    <small id="loginHelp" class="form-text text-muted">Digite um novo nome</small>
                </div>
                <!--mostra a pontuação atual do usuario-->
                <div class="form-group">
                    <label for="pontuacao">Pontuação: </label>
                    <input type="text" class="form-control" id="pontuacao" aria-describedby="pontuacaoHelp" placeholder="Alterar Pontuação" name="pontuacao" size="50" maxlength="3" value="<?php echo $usuario["pontuacao"]?>" required>
                    <small id="loginHelp" class="form-text text-muted">Digite uma nova Pontuação</small>
                </div>
                <!--mostra o level atual do usuario-->
                <div class="form-group">
                    <label for="level">Nivel: </label>
                    <input type="text" class="form-control" id="level" aria-describedby="levelHelp" placeholder="Alterar Nivel" name="nivel" size="50" maxlength="3" value="<?php echo $usuario["level"]?>" required>
                    <small id="loginHelp" class="form-text text-muted">Digite um novo Level</small>
                </div>
                <!--mostra o tipo da conta do usuario-->
                <div class="form-group">
                    <label for="tipoConta">Tipo de Conta: </label>
                    <input type="text" class="form-control" id="tipoConta" aria-describedby="tipoContaHelp" placeholder="Tipo de Conta" name="tipoConta" size="50" value="<?= $usuario["descricao"]?>" required>
                    <small id="loginHelp" class="form-text text-muted">Escolha o nivel de acesso do usuario</small>
                </div>
                                                                                
                <!--botao enviar-->
                <input type="submit" class="btn btn-success" value="Atualizar" name="alterarCadastro">
            </form>

            <hr>

            <!--alterar senha-->
            <form class="form-inline" action="/projetoFinal/controller/atualizarPerfilController.php" method="POST">
                <div class="form-group mb-2">
                    <label for="inputSenha1" class="sr-only">Alterar Senha:</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputSenha1" value="Alterar Senha:">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputSenha1" class="sr-only">Alterar Senha:</label>
                    <input type="password" class="form-control" id="inputSenha1" name="senha" placeholder="Senha" required>
                </div>
                <!--passando login escondido-->
                <input type="text" class="form-control" name="login" value="<?php echo $usuario["login"]?>" hidden>
                <button type="submit" class="btn btn-primary mb-2" name="alterarSenhaCadastro">Alterar</button>
            </form>

            <hr>

            <!--footer-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?> 

        </div> 
    </body>
</html>