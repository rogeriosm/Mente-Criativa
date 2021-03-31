<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sobre</title>
        
        <!--link externos-->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php'; ?>
        

    </head>
    <body>
        
        <div class="container-fluid col-12 col-xl-10">
        
        <!--cabeçalho-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/header.php'; ?>
            
        <!--conteudo-->
<!--        <div class="caixaExterna">
            
                <div class="cartao">
                    <div class="foto1 estilo">aqui vai uma foto</div>
                    <div class="texto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nesciunt corrupti, rerum quaerat cupiditate eum, optio voluptatum aliquid repellat fugit, tenetur fuga harum, excepturi libero quos vitae. Corporis pariatur, doloribus.</p>
                    </div>
                </div>

                <div class="foto2 estilo"></div>
                <div class="foto3 estilo"></div>
        </div>-->
        <div class="container mt-5 mb-5">
            
            <div class="row">
                <div class="card mr-5" style="width: 20rem;">
                    <img class="card-img-top" src="/projetoFinal/img/euclides.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h3>Euclides</h3>
                        <hr>
                        <p class="card-text">
                              Meu nome e Euclides, sou de Santa Maria da Vitória BA, vim para Brasilia para 
                              cuidar de minha mãe que graças a Deus esta melhor.
                              Faço curso de técnico de informatica na escola técnica de Ceilândia.
                              Na pessoa de meu colega Rogério cumprimento todos os homens. 
                              E na pessoa de minha colega cumprimento todas as mulheres.

                        </p>
                    </div>
                </div>
                
                <div class="card mr-5" style="width: 20rem;">
                    <img class="card-img-top" src="/projetoFinal/img/20161110_154122.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h3>Paula</h3>
                        <hr>
                        <p class="card-text">
                            Meu nome é Paula, estou concluíndo o curso de técnico em informática na ETC, também sou graduada em biologia
                            pela faculdade Anhanguera, desde 2013. Gosto de viajar e sou uma amante da natureza e da ciência. 
                        </p>
                    </div>
                </div>
                
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="/projetoFinal/img/20161110_123157.jpg" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">
                        <h3>Rogério</h3>
                        <hr>
                        Olá! Eu sou Rogério, adoro viajar, jogar, ver desenho e estudar programação.
                        Tenho curso técnico em jogos digitais feito no projeção e estou concluíndo
                        o curso técnico na ETC.
                      </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!--footer-->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/footer.php'; ?> 

        </div> 
    </body>
</html>