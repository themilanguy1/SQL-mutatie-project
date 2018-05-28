<?php
include 'connectlocal.php';

mysqli_query($conn,"DELETE FROM `winkel` WHERE winkel_id = " . $_GET["id"]);

header("Location: SQLhome.php");    

    

