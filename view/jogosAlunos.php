<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Jogos</title>

        <!--link externos-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>

    </head>
    <body>
    <!--   conteiner centraliza a div-->
        <div class="container-fluid col-12 col-xl-10">
            
            <!--cabeçalho-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>


            <!--cards de jogos-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/cardsJogos.php'; ?>
            

            <!--footer-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?>

        
    </div>
    </body>
</html>
