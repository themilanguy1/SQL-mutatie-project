<?php
include 'connectlocal.php';

$stad = ucfirst($_POST['stadnaaminput']);
$query = mysqli_query($conn, "SELECT stad_naam FROM stad WHERE stad_naam='".$stad."'");
    if (!$query) {
        die('Error: ' . mysqli_error($conn));
    }
if(mysqli_num_rows($query) > 0){
    header('Location: error.php?error=stad');
    } else {
        $pop = $_POST['stadpopinput'];
        $sql3 = mysqli_query($conn, "SELECT MAX(stad_id) FROM stad");
        if(mysqli_num_rows($sql3) > 0) {
            while($row = mysqli_fetch_assoc($sql3)) { 
                echo $row['MAX(stad_id)'];
                $stad_id = $row['MAX(stad_id)'] + 1;
            }
        }

        $sql = "INSERT INTO stad (stad_id, stad_naam, populatie)
        VALUES ('$stad_id', '$stad', '$pop')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        header('Location: SQLhome.php');
}



