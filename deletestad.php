<?php
include 'connectlocal.php';

mysqli_query($conn,"DELETE FROM `stad` WHERE stad_id = " . $_GET["id"]);

header("Location: SQLhome.php");    

    
