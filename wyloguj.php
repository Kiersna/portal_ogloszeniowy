<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: strona_glowna.php");
    exit();
?>
