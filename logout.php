<?php
    session_start();

    unset($_SESSION['ID']);
    unset($_SESSION['login']);
    unset($_SESSION['imie']);
    unset($_SESSION['nazwisko']);
    unset($_SESSION['klasa']);
    unset($_SESSION['email']);
    unset($_SESSION['pokoj']);
    $ref=$_GET['ref'];
    
    $errmsg_arr=array();
    
    $errmsg_arr[] = "Wylogowano!";
    
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: $ref");
    exit();
?>
