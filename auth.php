<?php
    if(!isset($_SESSION['login']) && $_SESSION['klasa']!='admin'){
        header("location: index.php");
        exit();
    }
?>
