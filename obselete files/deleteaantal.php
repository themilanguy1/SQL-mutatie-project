<?php
include 'connect.php';

mysqli_query($conn,"DELETE FROM `stad_winkel` WHERE aantal_id = " . $_GET["id"]);

header("Location: SQLhome.php");    

