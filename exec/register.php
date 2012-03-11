<?php
    session_start();
    require_once('../connect.php');
    
    $errmsg_arr = array();
    
    $login=$_GET['login'];
    $pass=$_GET['pass'];
    $klasa=$_GET['class'];
    
    if($login==''){
        $errmsg_arr[]='Brak loginu!';
    }
    if($pass==''){
        $errmsg_arr[]='Brak has³a!';
    }
    if($errmsg_arr){
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: ../register.php");
	exit();
    }else{
        $tmp="select * from users where login='$login'";
        $result= mysql_query($tmp);
        if(mysql_num_rows($result)>0){
            $errmsg_arr[]='Login zajêty!';
        }else{
            $tmp="insert into users (login,pass,klasa) values ('$login','".md5($pass)."','$klasa')";
            $result=mysql_query($tmp);
            $errmsg_arr[]='Zarejestrowano pomy¶lnie';
        }
    }
    if($errmsg_arr){
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: ../register.php");
	exit();
    }
    
?>
