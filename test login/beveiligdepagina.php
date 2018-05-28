<?php
session_start();
if(isset($_SESSION['login'])) {
    if($_SESSION['login'] == true) {
        ?>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Login succesvol</title>
        </head>
        <body>
            <h2>Welkom op de beveiligde pagina.</h2>
        </body>
        </html>
        <?php
    }  
} else {
    echo "Wat doe jij hier?";
}
?>

