<?php
include 'connectlocal.php';

$stad = ucfirst($_POST['stadnaaminput']);

var_dump($stad);

$sqlcheck = "SELECT stad_naam FROM stad WHERE EXISTS (SELECT stad_naam FROM stad WHERE stad_naam = '$stad')";

if ($conn->query($sqlcheck) === TRUE) {
    echo "bestaat";
} else {
    echo "bestaat niet";
}

// $pop = $_POST['stadpopinput'];
// $sql = "INSERT INTO stad (stad_naam, populatie)
// VALUES ('$stad', '$pop')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


// header('Location: SQLhome.php');