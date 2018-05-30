<?php
include 'connectlocal.php';

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
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        header('Location: SQLhome.php');
}



