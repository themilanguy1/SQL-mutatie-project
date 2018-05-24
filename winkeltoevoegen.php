<?php
include 'connectlocal.php';

$winkelid = $_POST['winkelafkortinginput'];
$winkelnaam = $_POST['winkelnaaminput'];
$sql = "INSERT INTO winkel (winkel_id, winkel_naam)
VALUES ('$winkelid', '$winkelnaam')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header('Location: SQLhome.php#winkelweergave');

?>