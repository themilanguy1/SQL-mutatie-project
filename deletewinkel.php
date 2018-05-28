<?php

    $user = 'root';
    $pass = '';
    $database = 'winkels';
    $db = new mysqli('localhost', $user, $pass, $database) or die("Unable to connect to database");

    mysqli_query($db,"DELETE FROM `winkel` WHERE winkel_id = " . $_GET["id"]);

    // header("Location: SQLhome.php");    
    // echo $_GET["id"];

    

