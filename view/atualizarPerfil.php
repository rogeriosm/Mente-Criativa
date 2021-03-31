<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Atualizar Perfil</title>
        
        <!--link externos-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>
        

    </head>
    <body>
        
        <div class="container-fluid col-12 col-xl-10">
        
        <!--cabeçalho-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>
        <hr>
        <!--formualrio para atualizar perfil-->
          
        <form class="form-inline" action="/projetoFinal/controller/atualizarPerfilController.php" method="POST">
            <div class="form-group mb-2">
                <label for="inputNome1" class="sr-only">Nome: </label>
                <input type="text" readonly class="form-control-plaintext" id="inputNome1" value="Nome:">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputNome2" class="sr-only">Nome: </label>
                <input type="text" class="form-control" id="inputNome2" placeholder="Nome" name="nome" required>
                
            </div>
            <!--passando login escondido para que o nome seja alterado na lista de amigos tbm-->
            <input type="text" class="form-control" name="login" value="<?=$_SESSION['login']?>" hidden>
            
            <input type="submit" class="btn btn-primary mb-2" name="alterarNome" value="Alterar">
        </form>
        
        <!--form para alterar senha-->
        <form class="form-inline" action="/projetoFinal/controller/atualizarPerfilController.php" method="POST">
            <div class="form-group mb-2">
                <label for="inputSenha1" class="sr-only">Senha</label>
                <input type="text" readonly class="form-control-plaintext" id="inputSenha1" value="Senha:">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputSenha2" class="sr-only">Senha:</label>
                <input type="password" class="form-control" id="inputSenha1" name="senha" placeholder="Senha" required>
            </div>
            <!--passando login escondido-->
            <input type="text" class="form-control" name="login" value="<?=$_SESSION['login']?>" hidden>
            <button type="submit" class="btn btn-primary mb-2" name="alterarSenha">Alterar</button>
            
            <!--mensagem de alerta sucesso ou erro-->
        </form>
        <hr>
        <!--footer-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?> 

        </div> 
    </body>
</html>
