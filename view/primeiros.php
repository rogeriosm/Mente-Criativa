
<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/projetoFinal/DAO/UsuarioDAO.php';
    
    $usuarioDAO = new UsuarioDAO();
    $primeiros = $usuarioDAO->primeiros();
 
 // funcção para retorna em ordem crecente ou decrecente
 //    function cmp($a, $b) {
	// return $a['level'] < $b['level'];
 //    }
    
 //    usort($primeiros, 'cmp');
    
    
    echo "<table class='table table-hover mt-10'>";
    echo "<tr>";
    echo "  <th>USUÁRIO</th>";
//    echo "  <th>Pontuação</th>";
    echo "  <th>LEVEL</th>";
    echo "</tr>";

    foreach ($primeiros as $c) {
        if($c['tipousuario_id_tipoUsuario'] == 3 ):
            echo "<tr>";
            echo "  <td>".strtoupper($c["nome"])."</td>";
    //      echo "  <td>{$c["pontuacao"]}</td>";
            echo "  <td>{$c["level"]}</td>";
            echo "</tr>";
        endif;
    }

    echo "</table>";
