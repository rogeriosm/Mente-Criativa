<?php 
session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/PontosDTO.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/PontosDAO.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';
    

    $pontos = $_GET['pontos'];
    $id = $_GET['id']; 
    $pontuacao = $_GET['pontuacao']; 
    $level_idAluno = $_GET['level_idAluno']; 
    $quemE = $_GET['quemE']; 
    
    $pontosDTO = new PontosDTO;
    $pontosDAO = new PontosDAO;
    $usuarioDAO = new UsuarioDAO;

    $pontosDTO->setPontos($pontos);
    $pontosDTO->setId($id);
    $pontosDTO->setPontuacao($pontuacao);
    $pontosDTO->setLevel_idAluno($level_idAluno);
    $pontosDTO->setQuemE($quemE);
    
    if($quemE == 1){
        //pega o valor dos pontos no banco de dados
        $dados = $pontosDAO->pegaPontuacaoUsuario($pontosDTO);
        
        //sobe o personagem de level
        if((int)$dados[0]['pontuacao']>= 50){
            //pega o level atual e soma mais um
            $level = (int)$dados[0]['level'];
            $level++;
            
            //guarda o novo valor do level
            $pontosDTO->setLevel_idAluno($level);
            
            //sobe o level
            $usuarioDAO->sobeLevel($pontosDTO);
            
            //zerando a pontuação para começar de novo a contagem
            $pontosDTO->setNovoValor(0);
            $pontosDAO->zeraPontos($pontosDTO);
            

        }else{
        
        //soma os clicks mais os valores do bando de dados
        $novoValor = (int)$pontos + (int)$dados[0]['pontuacao'];echo "<br>";
        
        //joga o novo valor dentro do get
        $pontosDTO->setNovoValor($novoValor);
        
        }
        

        //salvando novo valor no banco de dados
        $sucesso = $pontosDAO->salvaPontuacaoUsuario($pontosDTO);
        if($sucesso){
            echo "<script>";
            echo "window.location.href = '/projetoFinal/index.php';";
            echo "</script> ";
        }
        
        
        
    }else if($quemE == 2){
        //pega o valor dos pontos no banco de dados
        $dados = $pontosDAO->pegaPontuacaoAluno($pontosDTO);
        
        //soma os pontos com os clicks
        $novoValor = (int)$pontos + (int)$dados[0]['pontuacao'];echo "<br>";
        $pontosDTO->setNovoValor($novoValor);

        //salvando novo valor
        $sucesso = $pontosDAO->salvaPontuacaoAluno($pontosDTO);
        if($sucesso){
            echo "<script>";
            echo "window.location.href = '/projetoFinal/view/jogosAlunos.php?id={$id}&pontuacao={$pontuacao}&level_idAluno={$level_idAluno}&quemE={$quemE}';";
            echo "</script> ";
        }
    }