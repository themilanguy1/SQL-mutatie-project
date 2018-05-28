<?php
include 'connectlocal.php';

$winkelafkorting = $_POST['winkelafkortinginput'];
$winkelnaam = ucfirst($_POST['winkelnaaminput']);
$sql = "INSERT INTO winkel (winkel_afkorting, winkel_naam)
VALUES ('$winkelafkorting', '$winkelnaam')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header('Location: SQLhome.php');
