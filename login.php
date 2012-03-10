<?php
     session_start();
     if(isset($_SESSION['login'])){
        $login=$_SESSION['login'];
     }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
        <title>Ticket System</title>
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
    <body>
        <div id="wrapper">
            <div id="header-wrapper">
                <div id="header">
                    <div id="logo">
                        <div id="white">
                        <form action="exec/login-exec.php" method="get">
                            <table><tr>
                                    <?php
                                        if(!isset($login)){
                                            echo '<td>Login:<input type="text" name="login"></input></td>
                                                <td>Hasło:<input type="password" name="pass"></input></td>
                                                <td><input type="submit" value="OK"></input></td>';
                                        }else{
                                            echo "<td>Zalogowano jako <b>" .$login. "</b></td>";
                                            echo "<td><a href='logout.php'>[ wyloguj ]</a></td>";
                                        }
                                        if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                                            echo '<td>'; 
                                            foreach ($_SESSION['ERRMSG_ARR'] as $msg){
                                            echo '<li>' . $msg . '</li>';
                                        }
                                        echo '</td>';
                                        unset($_SESSION['ERRMSG_ARR']);
                                        }
                                    ?>
                            </tr></table>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</html>