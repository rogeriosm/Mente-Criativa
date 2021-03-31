<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Pesquisar Amigo</title>
        
        <!--link externos-->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>
        

    </head>
    <body>
        
        <div class="container-fluid col-12 col-xl-10">
        
        <!--cabeçalho-->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>
            
        <!--conteudo-->
        
        <hr>
        <form action="/projetoFinal/view/resultadoPesquisa.php" method="POST" target="centro">  

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Digite um nome" name="nomeAmigo" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                <!-- passando o login do usuario para comparação com a pesquisa -->
                <input type="text" name="loginUsuario" value="<?=$_SESSION['login'];?>" hidden >

                <div class="input-group-append">
                    <button type="submit" class="input-group-text cursor" id="basic-addon2">Pesquisar</button>
                </div>
            </div>
        </form>
        <hr>
        <iframe name="centro" style=" width: 100%; height:600px;">Seu browser não suporta iframe</iframe>
        
        
        
        
        <!--footer-->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?> 

        </div> 
    </body>
</html>