<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Mente Criativa</title>

        <!--link externos-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>

    </head>
    <body>
    <!--   conteiner centraliza a div-->
        <div class="container-fluid col-12 col-xl-10">
            
            <!--cabeçalho-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>

            <div class="geral sombra coreSiteQuatro">
                
                <!--colocando informaçoes da pessoa logada-->
                <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/infoUsuario.php';?>
               

                <!--==============================================================-->
                <!--ranque dos 10 melhores site e alunos-->
                <div class=" primeiroColocado coreSiteCinco">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/primeiros.php'; ?>

                </div>
                

                <!--==============================================================-->  
                <!--caixa texto site-->
                <div class="pading">
                    <h1>Apresentação</h1>
                    <p class="text-justify">
                        Hoje em dia a tecnologia está cada vez mais avançada, 
                        influenciando todos nos de alguma forma. Nas empresas, 
                        nas escolas, em casa, no trabalho, nas faculdades, 
                        todos estão conectados. A internet nos beneficia em muitos aspectos, 
                        a facilidade em encontrar o que for preciso, 
                        a agilidade de produzir tarefas mais rápidas, 
                        fazer pesquisa, elaboração de trabalhos escolares e serviços em geral. 
                        Nem todas as creches e escolas do Brasil possuem computadores dentro de suas salas, 
                        a internet é a tecnologia mais usada que temos, 
                        na verdade ela é a comunicação mais essencial da atualidade, 
                        os jogos digitais pedagógicos é uma forma de comunicação entre a criança e a máquina, 
                        assim ela pode ver um mundo de maneira mais interessante, pois sua curiosidade é enorme em relação 
                        ao que seus olhos vêem tudo que chama sua atenção com certeza a deixará feliz.
                    </p>
                </div>

            </div>

            <!--==============================================================-->

            <!--carousel-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/carousel.php'; ?>
            <!--cards de jogos-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/cardsJogos.php'; ?>

            <!--footer-->
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?>

        </div>
    </body>
</html>
