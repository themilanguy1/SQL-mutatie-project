<?php
include 'connectlocal.php';

$stad = ucfirst($_POST['stadnaaminput']);
$pop = $_POST['stadpopinput'];
$sql = "INSERT INTO stad (stad_naam, populatie)
VALUES ('$stad', '$pop')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header('Location: SQLhome.php');

?>

<?php
// include 'connectlocal.php';

// $stad = ucfirst($_POST['stadnaaminput']);
// $pop = $_POST['stadpopinput'];


// function checkifexist($stad)
// {
//     $sqlcheck = "SELECT naam FROM stad WHERE naam='$stad' LIMIT 1";
//     $result = mysqli_query($conn, $sqlcheck);

//     if(mysqli_fetch_assoc($result) !== false) {
//         $check = 1;
//     } else {
//         $check = 0;
//     }
// }

// checkifexist();

// if($check = 1) {
//     echo "hello there";
// } else {
//     echo "not quite";
// }

// $sqlcheck = "SELECT naam FROM stad WHERE naam='$stad' ";
// $result = mysqli_query($conn, $sqlcheck);
// while($row = mysqli_fetch_assoc($result)) {
//     if(!$row['naam'] == $stad) {
//         $sql = "INSERT INTO stad (naam, populatie)
//         VALUES ('$stad', '$pop')";
    
//         if ($conn->query($sql) === TRUE) {
//             echo "New record created successfully";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     } else {
        
//     }
// }

//     $conn->close();
//     header('Location: SQLhome.php#stadweergave');

?>