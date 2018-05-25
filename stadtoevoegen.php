<?php
include 'connectlocal.php';

$stad = $_POST['stadnaaminput'];
$pop = $_POST['stadpopinput'];
$sql = "INSERT INTO stad (naam, populatie)
VALUES ('$stad', '$pop')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header('Location: SQLhome.php#stadweergave');

?>