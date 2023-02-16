<?php
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../../template/includes/session.php';
include "../../../template/includes/dbcon.php";
?>

        <!DOCTYPE html>
        <html>
        <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GSBE </title>
        <style>
        body, html {
            height: 100%;
        }

        .bg {
            /* The image used */
            background-image: url("../../images/404.png");

            /* Full height */
            height: 100%;
            width: 100%;
            
            /* Center and scale the image nicely */
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: auto;
            

        }
        body {
            text-align: center;
            position: center bottom;
        }


        h1 {
            font-size: 50px;
            font-family: "Comic Sans MS", sans-serif;
            
        }

        h4 {
            font-size: 20px;
            color: gray;
            margin-left: 50px;
            margin-right: 50px;
            font-family: "Helvetica", sans-serif;
        }

        .button {
            font-size: 20px;
            font-family: "Helvetica", sans-serif;
            display: inline-block;
            padding: 10px 20px;
            color: black;
            background-color: transparent;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: powderblue;
        }

        .button:active {
            transform: translateY(2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        </style>
        </head>
        <body>

        <div class="bg">
            <?php
            if ($_SESSION['role']=='Administrator') {
                echo '<h1>AHHHHH! YOU FOUND ME!</h1><br><h4>Unfortunately, you have also found an elusive <b> 404 Error page</b>, which means the page  you were looking for. Do not worry it is not your fault. It is probably just a glitch in the matrix.</h4><a href="../librarian/index.php"><br><button class="button">Hover Here!</button></a></center>';
            }elseif ($_SESSION['role']=='Student') {
                echo '<center><h1>AHHHHH! YOU FOUND ME!</h1><br><h4>Unfortunately, you have also found an elusive <b> 404 Error page</b>, which means the page  you were looking for. Do not worry it is not your fault. It is probably just a glitch in the matrix.</h4><a href="../students/students_home.php"><br><button class="button">Hover Here!</button></a></center>';
            }elseif ($_SESSION['role']=='Super Admin') {
                echo '<center><h1>AHHHHH! YOU FOUND ME!</h1><br><h4>Unfortunately, you have also found an elusive <b> 404 Error page</b>, which means the page  you were looking for. Do not worry it is not your fault. It is probably just a glitch in the matrix.</h4><a href="../admin/super_admin_home.php"><br><button class="button">Hover Here!</button></a></center>';
            }
            
            ?>
        </div>


        </body>
        </html>