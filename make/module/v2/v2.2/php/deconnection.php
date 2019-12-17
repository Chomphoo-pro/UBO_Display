<?php
    session_start();

    unset($_SESSION['statut']);
    unset($_SESSION['login']);

    session_destroy();

    
    header("refresh:0;url=session.php");
?>
