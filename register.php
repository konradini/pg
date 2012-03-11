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
        
        <div style="clear: both;">&nbsp;</div>
        <div style="clear: both;">&nbsp;</div>
        <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
        <form action="exec/register.php" method="get">
            <table>
                <tr><td><div style="color: black;">Login:</div></td>
                <td><input type="text" name="login"></input></td></tr>
                <tr><td><div style="color: black;">Hasło:</div></td>
                <td><input type="password" name="pass"></input></td></tr>
                <tr><td>
                    <div style="color: black;">Klasa:</div></td>
                    <td><select name="class">
                        <option value="admin">Administrator</option>
                        <option value="user">Użytkownik</option>
                    </select>
                </td></tr>
                <tr><td><input type="submit" value="OK"></input></td></tr>
            </table>
        </form>
        <div style="color: black;">
        <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
            foreach ($_SESSION['ERRMSG_ARR'] as $msg){
                echo '<li>' . $msg . '</li>';
            }
            unset($_SESSION['ERRMSG_ARR']);
        }
        ?>
        </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
