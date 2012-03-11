<?php
    session_start();
    require_once('../connect.php');
    
    $ip=$_GET['ip'];
    $pokoj=$_GET['pokoj'];
    $type=$_GET['type'];
    $info=$_GET['info'];
    $usid=$_GET['usid'];
    
    $errmsg_arr = array();
    
    if($pokoj==''){
        $errmsg_arr[]='Nie podano pokoju!';
    }
    if($type==''){
        $errmsg_arr[]='Nie podano typu usterki!';
    }
    if($errmsg_arr){
        $_SESSION['ERRMSG_ADD'] = $errmsg_arr;
	session_write_close();
	header("location: ../dodaj.php");
	exit();
    }else{
        $tmp="insert into ticket(ip,pokoj,kategoria,info,id_zloz) values ('$ip','$pokoj', '$type', '$info','$usid')";
        mysql_query($tmp);
        $errmsg_arr[]='Dodano pomy¶lnie';
    }
    if($errmsg_arr){
        $_SESSION['ERRMSG_ADD'] = $errmsg_arr;
	session_write_close();
	header("location: ../dodaj.php");
	exit();
    }
?>