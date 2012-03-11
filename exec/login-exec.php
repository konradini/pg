<?php
	session_start();
	require_once('../connect.php');
        
            $errmsg_arr = array();
            
            $login = $_GET['login'];
            $pass = $_GET['pass'];
            
            if($login == '') {
		$errmsg_arr[] = 'Brak loginu';
            }
            if($pass == '') {
		$errmsg_arr[] = 'Brak has³a';
            }
            if($errmsg_arr) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../index.php");
		exit();
            }
            
            $qry="SELECT * FROM users WHERE login='$login' AND pass='".md5($pass)."'";
            $result=mysql_query($qry);
            //echo md5($password);
            //die();
            
            if($result){
                if(mysql_num_rows($result)==0){
                    $errmsg_arr[] = 'B³êdny login lub has³o';
                }
                else{
                    session_regenerate_id();
                    $member = mysql_fetch_assoc($result);
                    $_SESSION['ID']=$member['id'];
                    $_SESSION['login']=$member['login'];
                    $_SESSION['imie']=$member['imie'];
                    $_SESSION['nazwisko']=$member['nazwisko'];
                    $_SESSION['klasa']=$member['klasa'];
                    $_SESSION['email']=$member['email'];
                    $_SESSION['pokoj']=$member['pokoj'];
                    
                    header('location: ../index.php');
                }
            }
            
            if($errmsg_arr) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../index.php");
		exit();
            }
?>