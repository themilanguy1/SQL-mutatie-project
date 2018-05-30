<?php
include 'connectlocal.php';

$stad = $_POST['aantalstadinput'];
$winkel = $_POST['aantalwinkelinput'];
$query = mysqli_query($conn, "SELECT stad_id, winkel_afkorting FROM stad_winkel WHERE stad_id='".$stad."' AND winkel_afkorting ='".$winkel."' ");
    if (!$query) {
        die('Error: ' . mysqli_error($conn));
    }
if(mysqli_num_rows($query) > 0){
    header('Location: error.php?error=filialen');
    } else {
        $aantal = $_POST['aantalnummerinput'];
        $sql = "INSERT INTO stad_winkel (stad_id, winkel_afkorting, aantal_filialen)
        VALUES ('$stad', '$winkel', '$aantal')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        header('Location: SQLhome.php');
}
