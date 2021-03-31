<header class="coreSiteTres sombra">
    <!-- menu de login criar conta -->
    <div class="absoluto">
        <!--verifica se tem alguem logado no sistema do site e mostra o login-->
        <?php
            //inicia a sessao
            session_start(); 
//chama no banco de dados o level, pontos e o nome do usuario toda vez que atualiza a pagina
            require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';
            $UsuarioDAO = new UsuarioDAO();
            
            
            // $tipoConta = array('Administrador','Instituição','Usuario');
            
//mostra o nome da pessoa logada no lugar da tela de login
            if(isset($_SESSION['nome'])){
                $usuarioDAO = $UsuarioDAO->getUsuarioById($_SESSION['login']);
                
                echo "<span class='d-block p-2 bg-primary text-white'>Bem Vindo ".strtoupper($usuarioDAO['nome'])."</span>";
                        
                //mudando os valores do get dependendo de quem estiver logado
                //quando esta logado coloca os valores do jogador para o bd
                if ($_SESSION['tipoConta'] == 'usuario' or $_SESSION['tipoConta'] == 'administrador') {
                    //usuario
                    $id=$_SESSION['login'];
                    $pontuacao=$_SESSION['pontuacao'];
                    $level_idAluno=$_SESSION['level'];
                    $quemE=1;
                }

                if (!empty($_GET['quemE']) and $_GET['quemE']==2) {
                    //aluno
                    $id=$_GET['id'];
                    $pontuacao=$_GET['pontuacao'];
                    $level_idAluno=$_GET['level_idAluno'];
                    $quemE=2;
                }
        
            }else{
                //diz que nao tem niguem logado e cria um id fake para os links funcionarem
                require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/view/login.php';
                $id="naoLogado";
                $pontuacao="0";
                $level_idAluno="0";
                $quemE=3;
            }
        ?>

        
    </div>

    <!--logo-->
    <p id="logo" class="zindex"><strong>Mente Criativa</strong></p>
    <img src="/projetoFinal/img/logo.png" alt="Logo do site" id="imgLogo">
    
</header>

<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-dark coreSiteSeis sombra">

    <a href="/projetoFinal/index.php" class="navbar-brand">
        <!--colocar foto aqui-->
        <img src="/projetoFinal/img/logo.png" class="logoBrand" alt="Foto">
    </a>

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="/projetoFinal/index.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="/projetoFinal/view/sobre.php" class="nav-link">Sobre</a></li>
            <li class="nav-item"><a href="/projetoFinal/view/agradecimentos.php" class="nav-link">Agradecimentos</a></li>
            <?php
                //mostra as opçoes dependendo do usuario 
                if(empty($_SESSION['tipoConta']) or $_SESSION['tipoConta'] == "administrador" or $_SESSION['tipoConta'] == "usuario"){
            ?>      
                <!--jogos-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownSite" data-toggle="dropdown">Jogos</a>
                    <div class="dropdown-menu">
                        <a href="/projetoFinal/jogos/jogoLetras/index.php?id=<?=$id?>&pontuacao=<?=$pontuacao?>&level_idAluno=<?=$level_idAluno?>&quemE=<?=$quemE?>" class="dropdown-item">Jogo Consoantes/vogais</a>
                        <a href="/projetoFinal/jogos/jogoAlfabeto/index.php?id=<?=$id?>&pontuacao=<?=$pontuacao?>&level_idAluno=<?=$level_idAluno?>&quemE=<?=$quemE?>" class="dropdown-item">Jogo do Alfabeto</a>
                        <a href="/projetoFinal/jogos/jogoNumeros/index.php?id=<?=$id?>&pontuacao=<?=$pontuacao?>&level_idAluno=<?=$level_idAluno?>&quemE=<?=$quemE?>" class="dropdown-item">Jogo dos Numeros</a>
                        <a href="/projetoFinal/jogos/jogoConta/index.php?id=<?=$id?>&pontuacao=<?=$pontuacao?>&level_idAluno=<?=$level_idAluno?>&quemE=<?=$quemE?>" class="dropdown-item">Jogo Conta</a>
                        <a href="/projetoFinal/jogos/jogoFormas/index.php?id=<?=$id?>&pontuacao=<?=$pontuacao?>&level_idAluno=<?=$level_idAluno?>&quemE=<?=$quemE?>" class="dropdown-item">Jogo das Formas</a>
                        <a href="/projetoFinal/jogos/jogoCores/index.php?id=<?=$id?>&pontuacao=<?=$pontuacao?>&level_idAluno=<?=$level_idAluno?>&quemE=<?=$quemE?>" class="dropdown-item">Jogo das Cores</a>
                    </div>
                </li>
            <?php
                }
            ?>  
            <!--<li class="nav-item"><a href="#" class="nav-link">Contatos</a></li>-->
            
            <!--menu usuario-->
            <?php
                if(isset($_SESSION['tipoConta'])){
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownSite" data-toggle="dropdown">Menu <?=$_SESSION['tipoConta']?></a>
                        <div class="dropdown-menu">
                            <a href="/projetoFinal/view/atualizarPerfil.php" class="dropdown-item">Editar Perfil</a>
                            
                            <?php
                                //mostra as opçoes dependendo do usuario 
                                if($_SESSION['tipoConta']=='administrador'){
                                    echo '<a class="dropdown-item" href="/projetoFinal/view/listarUsuarios.php">Listar Usuarios</a>';
                                }
                                else if($_SESSION['tipoConta']=='instituicao'){
                            ?>
                                    <a class="dropdown-item cursor" onclick="cadastrarAluno('<?=$_SESSION["login"]?>')">Cadastrar Aluno</a>
                            <?php      
                                }
//                                else if($_SESSION['tipoConta']==2){
//                                    
//                                    
//                                }
                            ?>
                            <a class="dropdown-item cursor" onclick="mudaPagina()">Salvar Pontuação</a>
                            <a onclick="excluirUsuario('<?=$_SESSION["login"]?>',0)" class="dropdown-item cursor">Excluir Conta</a>
                            <a href="/projetoFinal/controller/logoffController.php" class="dropdown-item">Sair</a><!-- sai do sistema -->
                        </div>
                    </li>
                    
            <?php        
                }
            ?>
        </ul>
    </div>
</nav>
<!--mostrando as mensagens-->
<?php
    if (!empty($_GET["msg"])) {
        echo '<div class="alert alert-warning alert-dismissible fade show zindex" role="alert">';
        echo $_GET["msg"];
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
?>
<!--funções alertas-->
<script src="/projetoFinal/js/script.js" type="text/javascript"></script>
