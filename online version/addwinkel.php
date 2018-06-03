<?php
include 'connect.php';

$winkelnaam = ucfirst($_POST['winkelnaaminput']);
$query = mysqli_query($conn, "SELECT winkel_naam FROM winkel WHERE winkel_naam='".$winkelnaam."'");
    if (!$query) {
        die('Error: ' . mysqli_error($conn));
    }

if(mysqli_num_rows($query) > 0){
    header('Location: error.php?error=winkel');
    } else {
        $winkelafkorting = $_POST['winkelafkortinginput'];
        $sql = "INSERT INTO winkel (winkel_afkorting, winkel_naam)
        VALUES ('$winkelafkorting', '$winkelnaam')";
        
        if ($conn->query($sql) === TRUE) {
        } else {
        }
        
        $conn->close();
        header('Location: SQLhome.php');
}



