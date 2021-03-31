<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Mensageiro</title>
        
        <!--link externos-->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>
        

    </head>
    <body>
        
        <div class="container-fluid col-12 col-xl-10">
        
            <!--cabeçalho-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>

            <!--conteudo-->
            <div class="mensageiroIFRAME">
            <!--recebendo as mensagens dos amigos-->
                <?php

                    //cria uma secao para nao perder o id enviado pelo post quando a pagina for reiniciada
                    //so cria uma seção se  nao estiver vazio
                    if(!empty($_POST['amigoId'])):
                        $_SESSION["amigoId"] = $_POST['amigoId'];
                        $_SESSION["amigoNome"] = $_POST['amigoNome'];
                        $_SESSION["idAmigo"] = $_POST['id_amigo'];
                    endif;

                    //chama e cria um novo dao
                    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/MensagemDAO.php';
                    $mensagem = new MensagemDAO();

                    //chama todas as mensagens
                    $allmensagem = $mensagem->mostrarTodasMensagens($_SESSION['login'],$_SESSION["amigoId"]);

                    //var_dump($allmensagem);die();

                    //mostra todas as mensagens do banco de dados entre os dois amigos
                    foreach ($allmensagem as $msgU){
                        if($msgU['amigo_login'] == $_SESSION["amigoId"]){
                            echo "<div class='mensagemUsuario'><p>".$msgU['mensagem']."</p></div>";
//                            echo "<div class='clear'> </div>";
                        }else{
                            echo "<div class='mensagemAmigo'><p>".$msgU['mensagem']."</p></div>";
//                            echo "<div class='clear'> </div>";
                        }
                    }
                ?>
            </div>

            <!--caixa de texto-->
            <form  action="/projetoFinal/controller/MensagemController.php" method="post">
                <div class="container-fluid mb-5">
                    <div class="row">
                        <textarea name="mensagem" class="mensageiroTxtArea" maxlength="249" placeholder="Digite uma mensagem para <?=$_SESSION["amigoNome"]?>" required></textarea><br>
                        <input type="text" name="usuario" value="<?=$_SESSION['login']?>" hidden>
                        <input type="text" name="amigoLogin" value="<?=$_SESSION["amigoId"]?>" hidden>
                        <input type="text" name="id_amigo" value="<?=$_SESSION["idAmigo"]?>" hidden>
                        <input type="submit" class="mensageiroBTN" value="Enviar">
                    </div>
                </div>
            </form>


            <!--footer-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?> 

        </div> 
    </body>
</html>