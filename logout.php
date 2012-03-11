<?php
    session_start();

    unset($_SESSION['ID']);
    unset($_SESSION['login']);
    unset($_SESSION['imie']);
    unset($_SESSION['nazwisko']);
    unset($_SESSION['klasa']);
    unset($_SESSION['email']);
    unset($_SESSION['pokoj']);
    $errmsg_arr=array();
    
    $errmsg_arr[] = "Wylogowano!";
    
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    echo "<script language = 'javascript'>parent.frames.menu2.location.reload()</script>";
    exit();
?>
