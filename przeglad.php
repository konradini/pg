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
     }
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
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
                            <?php
                                if(!isset($login)){
                                    echo "Brak dost�pu! Zaloguj si�";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>