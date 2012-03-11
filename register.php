<?php
    session_start();
    if(isset($_SESSION['login'])){
        $login=$_SESSION['login'];
        $id=$_SESSION['ID'];
        $klasa=$_SESSION['klasa'];
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
        <div id="framecontentTop">
            <div id="wrapper">
            <div id="header-wrapper">
                <div id="header">
                    <div id="logo">
                        <div style="color: white;">
                        <form id="form1" action="exec/login-exec.php" method="get">
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
                                        if(!isset($login) && isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
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
        </div>
        <div id="framecontentLeft">
            <div id="sidebar">
            <ul>
                <li>
                    <div style="clear: both;">&nbsp;</div>
                </li>
                <li>
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="przeglad.php">Przeglądaj zgłoszenia</a></li>
                        <li><a href="dodaj.php">Dodaj zgłoszenie</a></li>
                        <li><a href="zarzadzaj.php">Zarządzaj zgłoszeniami</a></li>
                        <?php
                            if(isset($login) && $klasa=='admin'){
                                echo "<li><a href='register.php'>Dodaj użytkownika</a></li>";
                            }
                        ?>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
        
        <div style="clear: both;">&nbsp;</div>
        <div style="clear: both;">&nbsp;</div>
        <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
        <form id="form2" action="exec/register.php" method="get">
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
        <div id="footer">
            <p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
        </div>
    </body>
</html>
