<?php
    session_start();
    $_SESSION['statut'] = null;
    $_SESSION['login'] = null;

    session_destroy();
    
    unset($_SESSION['statut']);
    unset($_SESSION['login']);
    
    header("refresh:0;url=session.php");
?>
