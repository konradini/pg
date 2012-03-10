<?php session_start(); ?>
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
        <form action="exec/register.php" method="get">
            <table><tr>
                <td>Login:<input type="text" name="login"></input></td>
                <td>Hasło:<input type="password" name="pass"></input></td>
                <td><input type="submit" value="OK"></input></td>
            </tr></table>
        </form>
        <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
            foreach ($_SESSION['ERRMSG_ARR'] as $msg){
                echo '<li>' . $msg . '</li>';
            }
            unset($_SESSION['ERRMSG_ARR']);
        }
        ?>
    </body>
</html>
