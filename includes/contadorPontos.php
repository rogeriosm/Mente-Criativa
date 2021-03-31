<?php
    $id = $_GET['id']; 
    $pontuacao = $_GET['pontuacao']; 
    $level_idAluno = $_GET['level_idAluno']; 
    $quemE = $_GET['quemE']; 
?>
<!--captura o click do mouse-->
<script>
    //guarda a quantidade de clicks dos jogos
    var click=0;
    function clickMouse(){
        
        //contabiliza os clicks do mouse
    	if (event.button === 0){
            click++;
        }
        if (event.button === 2){
            alert(click);
        }
        
    }
    //muda para pagina que guarda os pontos no banco de dados
    function mudaPagina(){
        window.location.href = "/projetoFinal/controller/PontosController.php?pontos="+click+"&id="+'<?=$id?>'+"&pontuacao="+'<?=$pontuacao?>'+"&level_idAluno="+'<?=$level_idAluno?>'+"&quemE="+'<?=$quemE?>';
    }
    //document.onmousedown=click;
    //window.captureEvents(Event.CLICK);
    window.onmousedown=clickMouse;
    alert('Não esqueça de salvar seu jogo antes de sair! Em seu menu...');
</script>
