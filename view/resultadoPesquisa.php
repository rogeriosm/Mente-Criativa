<?php
session_start();

//<!--link externos-->
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/includes/linksExternos.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/amigoDAO.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DTO/cadastrarUsuarioDTO.php';

    $usuarioDTO = new cadastrarUsuarioDTO();
    $usuarioDAO = new UsuarioDAO();
    $amigosDAO = new amigoDAO();
    
    $usuarioDTO->setNome($_POST['nomeAmigo']);
    $loginUsuario = $_POST['loginUsuario'] ;
    
    $usuario = $usuarioDAO->pesquisarUsuario($usuarioDTO);
    // uni os dois arrays para na pesquisa comparar os nomes e nao deixar adcionar o mesmo amigo duas vezes
    $amigos = $amigosDAO->getAllAmigos($_SESSION["login"]);

    $array = array ();

    // var_dump($array);echo " quebra=====<br>";
    // var_dump($usuario);echo " quebra=====<br>";
    // var_dump($amigos);echo " quebra=====<br>";
    // echo count($usuario);echo " quebra=====<br>";
    // echo count($amigos);echo " quebra=====<br>";

    // echo $usuario[1]['login'];echo " quebra=====<br>";
    // echo $amigos[0]['amigo_login'];echo " quebra=====<br>";
    



    if(!empty($usuario)):
        echo "<table class='table table-hover table-striped mt-10'>";
        echo "<tr>";
        echo "  <th>Login</th>";
        echo "  <th>nome</th>";
        echo "  <th>Adicionar como Amigo</th>";
        echo "</tr>";


        //if(!empty($amigos)){

            // for ($i=0; $i < count($usuario); $i++) { 
            //     if($usuario[$i]['tipousuario_id_tipoUsuario'] == 3 and !($usuario[$i]['login'] == $loginUsuario)):
                    
            //         echo "<tr>";
            //         echo "  <td>{$usuario[$i]["login"]}</td>";
            //         echo "  <td>{$usuario[$i]["nome"]}</td>";

            //         // verifica se ja tem esse amigo adcionado e nao deixa adcionar novamente
            //         for ($j=0; $j <  count($amigos); $j++) { 

            //             echo $i."".$j."<br>";
            //             echo $usuario[$i]['login']." ".$amigos[$j]['amigo_login']."<br>";

            //             print_r($array);

            //             if(!($usuario[$i]['login'] == $amigos[$j]['amigo_login']))
            //             {

            //                 foreach ($array as $k) {

            //                     echo $k['login']." ".$amigos[$j]['amigo_login'];die();
            //                     if(!empty($k['login'])and $k['login'] == $amigos[$j]['amigo_login'])
            //                     {
            //                         echo "  <td></td>";
            //                         break;
            //                     } 
            //                     echo "saiu";die();
            //                 }

            //                 echo "  <td><a href='/ProjetoFinal/controller/AdicionarAmigoController.php?idamigo={$usuario[$i]["login"]}&idmeu={$_SESSION['login']}&nomeAmigo={$usuario[$i]['nome']}&nomeUsuario={$_SESSION['nome']}'>Adicionar</a></td>";
 
            //             }
            //             else
            //             {
            //                 array_push($array,$usuario[$i]['login']);
            //                 echo "  <td></td>";
            //                 break;
            //             }
            //         }//=================================
            //         echo "</tr>";
                    
            //     endif;
            //}














        // }else{
            foreach ($usuario as $c) {
                if($c['tipousuario_id_tipoUsuario'] == 3):
                    if(!($c['login'] == $loginUsuario)):
                        echo "<tr>";
                        echo "  <td>{$c["login"]}</td>";
                        echo "  <td>{$c["nome"]}</td>";
                        echo "  <td><a href='/ProjetoFinal/controller/AdicionarAmigoController.php?idamigo={$c["login"]}&idmeu={$_SESSION['login']}&nomeAmigo={$c['nome']}&nomeUsuario={$_SESSION['nome']}'>Adicionar</a></td>";
                    
                        echo "</tr>";
                    endif;
                endif;
            }
        // }

    echo "</table>";
    else:
        echo "Usúario não encontrado ou não existe."; 
    endif;






                       // if($i>count($amigos)){continue;}

                        // var_dump(!($usuario[$i]['login'] == $amigos[$j]['amigo_login']));echo " comparacao quebra=====<br>";
                        // echo $usuario[$i]['login'];echo " comparacao quebra=====<br>";
                        // echo $amigos[$j]['amigo_login'];echo " comparacao quebra=====<br>";


                        // if(!($usuario[$i]['login'] == $amigos[$j]['amigo_login']) and !($usuario[$i]['login'] != $amigos[$j]['amigo_login']))
                        
                        // if($amigos[$i]['amigo_login'] == $usuario[$j]['login']){
                        //     $i++;
                        //     echo "  <td></td>";
                        //     break;
                        // }else{
                        //     echo "  <td><a href='/ProjetoFinal/controller/AdicionarAmigoController.php?idamigo={$usuario[$j]["login"]}&idmeu={$_SESSION['login']}&nomeAmigo={$usuario[$j]['nome']}&nomeUsuario={$_SESSION['nome']}'>Adicionar</a></td>";

                        // }
                        






    // if(!empty($usuario)):
    //     echo "<table class='table table-hover table-striped mt-10'>";
    //     echo "<tr>";
    //     echo "  <th>Login</th>";
    //     echo "  <th>nome</th>";
    //     echo "  <th>Adicionar como Amigo</th>";
    //     echo "</tr>";


    //     foreach ($usuario as $c) {
    //         if($c['tipousuario_id_tipoUsuario'] == 3):
    //             if(!($c['login'] == $loginUsuario)):
    //                 echo "<tr>";
    //                 echo "  <td>{$c["login"]}</td>";
    //                 echo "  <td>{$c["nome"]}</td>";

                    

    //                 echo "</tr>";
    //             endif;
    //         endif;
    //     }
    //     echo "</table>";
    // else:
    //     echo "Usúario não encontrado ou não existe."; 
    // endif;
      
