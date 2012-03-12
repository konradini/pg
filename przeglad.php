<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Wellness  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20100110

-->
<?php
    session_start();
     if(isset($_SESSION['login'])){
        $login=$_SESSION['login'];
        $klasa=$_SESSION['klasa'];
     }
     $ref=$_SERVER['PHP_SELF'];
?>
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
                        <form action="exec/login-exec.php" method="get">
                            <table><tr>
                                    <?php
                                        if(!isset($login)){
                                            echo "<td>Login:<input type='text' name='login'></input></td>
                                                <td>Hasło:<input type='password' name='pass'></input></td>
                                                <td><input type='hidden' value='$ref' name='ref'></input></td>
                                                <td><input type='submit' value='OK'></input></td>";
                                        }else{
                                            echo "<td>Zalogowano jako <b>" .$login. "</b></td>";
                                            echo "<td><a href='logout.php?ref=$ref'>[ wyloguj ]</a></td>";
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
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
                            <div style="color: black">
                            <?php
                                if(!isset($login))
                                    echo "Brak dostępu! Zaloguj się";
				else{
                                    require_once 'connect.php';
                                    $query="SELECT * FROM ticket ORDER BY id_t ";
                                    $result=mysql_query($query) or die (mysql_error());
                                    echo "<table align=\"center\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\" >";
                                    echo "<tr >";		
                                    echo "<td>"."Id"."</td>";
                                    echo "<td>"."Status"."</td>";
                                    echo "<td>"."Data Przyj"."</td>";
                                    echo "<td>"."Kategoria"."</td>";
                                    echo "<td>"."Data realizacji"."</td>";
                                    echo "<td>"."Id ticket"."</td>";
                                    echo "<td>"."IP"."</td>";
                                    echo "<td width=\"200px\">"."Info"."</td>";
                                    echo "</tr>";
                                    echo'<br />';
                                    while($row=mysql_fetch_object($result)) {
                                        echo "<tr >";		
					echo "<td>".$row->id_t."</td>";
					echo "<td>".$row->status."</td>";
					echo "<td>".$row->data_przy."</td>";
					echo "<td>".$row->kategoria."</td>";
					echo "<td>".$row->data_real."</td>";
					echo "<td>".$row->id_zloz."</td>";
					echo "<td>".$row->ip."</td>";
					echo "<td>".$row->info."</td>";
					echo "</tr>";
                                    }
                                    echo "</table>"	;
                                }                       ?>
                            </div>
                        </div>
                        <!-- end #content -->
                    </div>
                </div>
            </div>
            <!-- end #page -->
        <div id="footer">
            <p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
        </div>
    </body>
</html>
