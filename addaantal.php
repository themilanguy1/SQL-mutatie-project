<?php
include 'connectlocal.php';

$stad = $_POST['aantalstadinput'];
$winkel = $_POST['aantalwinkelinput'];
$aantal = $_POST['aantalnummerinput'];
$sql = "INSERT INTO stad_winkel (stad_id, winkel_id, aantal_filialen)
VALUES ('$stad', '$winkel', '$aantal')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: SQLhome.php');

