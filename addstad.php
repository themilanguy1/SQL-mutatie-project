<?php
include 'connectlocal.php';

$stad = ucfirst($_POST['stadnaaminput']);
$query = mysqli_query($conn, "SELECT stad_naam FROM stad WHERE stad_naam='".$stad."'");
    if (!$query) {
        die('Error: ' . mysqli_error($conn));
    }
if(mysqli_num_rows($query) > 0){
    } else {
        $pop = $_POST['stadpopinput'];
        $sql = "INSERT INTO stad (stad_naam, populatie)
        VALUES ('$stad', '$pop')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
}

header('Location: SQLhome.php');

