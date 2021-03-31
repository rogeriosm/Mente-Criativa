<!--mostra o conteudo do menu de informações do usuario-->
<?php
//chamando as conexoes com o banco de dados
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AlunoDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/AmigoDAO.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';

$alunoDAO = new alunoDAO();
$amigoDAO = new AmigoDAO();
//$usuarioDAO = new UsuarioDAO();



//verifica se existe alquem logado
if(!empty($_SESSION['login'])){
//busca os pontos e o level do usuario no banco de dados
$pontos_level = $UsuarioDAO->consultarPontuacao($_SESSION['login']);
//$usuarioDAO = $UsuarioDAO->getUsuarioById($_SESSION['login']);
?>
    <!--div container-->
    <div class="infoUsuario coreSiteCinco">
        <!--mostra o nome da pessoa logada-->
        
        <label for="sda"><?=$usuarioDAO['descricao']?>:<br> <?=strtoupper($usuarioDAO['nome']);?></label><br>

        <?php
//usuario
        if($_SESSION['tipoConta']=='usuario'){
        ?>        
            <!--conteudo-->
            <!--mostra o level da pessoa logada-->
            <label for="asd">Nivel:<?= $pontos_level['level'];?></label><br>
            <!--mostra a pontuacao do usuario-->
            <label for="asd">Pontos:<?= $pontos_level['pontuacao'];?></label>
            <hr>
            <a href="/projetoFinal/view/pesquisar.php" class="btn btn-primary btn-sm">Pesquisar Amigos</a>

        <?php
            $amigos = $amigoDAO->getAllAmigos($_SESSION["login"]);
            
            echo "<table class='table table-hover mt-10'>";
            echo "<tr>";
            echo "  <th colspan='2'>Amigos:</th>";
            echo "</tr>";
            
            foreach ($amigos as $c) {
                echo "<tr>";
        ?>         
                <!--transforma a lista de amigos em links para conversar-->
                <!--passa os valores por post-->
                <td>
                    <form action='/projetoFinal/view/mensageiro.php' method='post'>
                        <input type='text' value='<?=$c['id_amigo']?>' name='id_amigo' hidden>
                        <input type='text' value='<?=$c["amigo_login"]?>' name='amigoId' hidden>
                        <input type='text' value='<?=$c["nomeAmigo"]?>' name='amigoNome' hidden>
                            
                        <button type='submit' class='btn btn-primary btn-sm'>
                                <?=$c["nomeAmigo"]?> 
                                <i class='far fa-comments'></i>
                        </button>
                            
                    </form>
                </td>
               
                <td><a onclick="excluirAmigo('<?=$c["amigo_login"]?>','<?=$c["nomeAmigo"]?>','<?=$_SESSION['login']?>')"><i class='fas fa-trash-alt cursor'></i></a></td>
                
        <?php     
                echo "</tr>";
            }

            echo "</table>";
//instituição
        }else if($_SESSION['tipoConta']=="instituicao"){
        //conteudo          
            //alerta Para o aluno jogar click em seu nome
            echo '<div class="alert alert-warning alert-dismissible fade show zindex" role="alert">';
            echo "<hr>Para o aluno jogar click em seu nome<hr>";
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            
            //chamando os alunos do banco de dados
            $alunos = $alunoDAO->getAllAlunos($_SESSION['login']);
            
            echo "<table class='table table-hover mt-10'>";
            echo "<tr>";
            echo "  <th>Aluno</th>";
            echo "  <th colspan='2'>Pontuação</th>";
            echo "</tr>";
            
            foreach ($alunos as $c) {
                echo "<tr>";
            //transformando os nomes em icones
                echo "<td><a href='/projetoFinal/view/jogosAlunos.php?id={$c['nome']}&pontuacao={$c['pontuacao']}&level_idAluno={$c['id_alunos']}&quemE=2' class='btn btn-primary btn-sm'>"
                .strtoupper($c["nome"])
                ." <i class='fas fa-gamepad'></i></a></td>";
                echo "<td>{$c["pontuacao"]}</td>";
                
        ?>        
                <td><a onclick="excluirAluno('<?=$c['id_alunos']?>','<?=$c['nome']?>')"><i class='fas fa-trash-alt cursor'></i></a></td>
                
        <?php    
                echo "</tr>";
            }

            echo "</table>";
//administrador
        }else if($_SESSION['tipoConta']=="administrador"){
        ?>
            <!--conteudo-->
            <hr>


        <?php
        }
        ?>
    </div>
<?php
}
?>
        
        
