<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Agradecimentos</title>
        
    <!--link externos-->
    <?php require_once '../includes/linksExternos.php'; ?>
        
    </head>
    <body>
        
        <div class="container-fluid col-12 col-xl-10">
        
            <!--cabeçalho-->
            <?php require_once '../includes/header.php'; ?>

            <!--carrocel-->
            <div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/projetoFinal/img/finalUm.png" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                        <!--<h5>primeira imagem</h5>
                        <p>um texto</p>-->
                        </div>

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/projetoFinal/img/finalDois.png" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                        <!--<h5>Segunda imagem</h5>
                        <p>um texto</p>-->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/projetoFinal/img/finalTres.png" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                        <!--<h5>Terceira imagem</h5>
                        <p>um texto</p>-->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/projetoFinal/img/finalQuatro.png" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                        <!--<h5>Terceira imagem</h5>
                        <p>um texto</p>-->
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

                <!--caixa de texto-->
            <div class="geral2 coreSiteQuatro">

                <!--caixa texto site-->
                <div class="pading">
                    <h1>AGRADECIMENTOS</h1>
                    <p class="text-justify texto"><strong>
                        Queremos agradecer a Deus em primeiro lugar, por ter nos dados a oportunidade de apresentar esse projeto, 
                        nos proporcionou sabedoria e paciência para a realização desse trabalho.
                        Agradecemos a parceria que tivemos para o término desse projeto, a união faz a força.
                        Aos professores pelos ensinamentos, pela transmissão de conhecimentos, do primeiro módulo (Ana Maria, Anderson, Eliane, Isabela, Marcelo e Tadeu), 
                        segundo módulo (Alessandro, Antônio Carlos, Edimar, Jussara e Waldemar) e terceiro módulo 
                        (Edimar novamente, Edmilson, Roque, Vinícius e Thiago) do curso técnico em informática.
                        Aos nossos pais e amigos que esteve sempre conosco.
                        Aos nossos colegas de sala, que sempre estiveram ao nosso lado nos apoiando e nos incentivando.
                        Ao núcleo pedagógico do Centro de Ensino da Primeira Infância, CEPI-MANDACARU, Professoras 
                        (Ana Laura, Mirian, Simone e Tayanna) Monitoras (Adriana, Ana, Janaína, Natalía, Patrícia, Patrícia Borges e Taylla)
                        Há todos vocês muito obrigado!
                    </strong></p>
                    <div class="clearfix"></div>
                </div>

            </div> 

                <!--footer-->
                <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?>
        </div>
    </body>
</html>