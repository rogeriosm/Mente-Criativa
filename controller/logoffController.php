<?php
    session_start();
    session_destroy();

    echo "<script>";
    echo "window.location.href = '/projetoFinal/index.php';";
    echo "</script> ";
?>
