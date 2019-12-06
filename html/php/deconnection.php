<?php
    session_start();
    $_SESSION['statut'] = null;
    $_SESSION['login'] = null;
    session_destroy();
    header("refresh:0;url=session.php");
?>
