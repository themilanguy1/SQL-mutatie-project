<?php
    include 'connect.php';

if(isset($_POST['optie'])) {
    $stem=$_POST['optie'];

    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE ID=$stem";

    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Fout tijdens updaten van stemmen database" . $conn->error;
    }    
}


$sql = "SELECT vraag FROM poll";
$result = $conn->query($sql);

//print stelling/vraag
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>".$row['vraag']."</b>";
    }
} else {
    echo "geen vraag gevonden";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>poll</title>
</head>
<style>
    .titel {
        margin: auto;
        margin-bottom: 1em;
    }
    body {
        font-size: 30px;
    }
</style>
<body>
    <form id="pollform" method="post" action="">
        <input type="radio" name="optie" value="1"> optie 1: hahahahhaha
        <br>
        <input type="radio" name="optie" value="2"> optie 2: ahahhahahahahahahaa
        <br>
        <input type="radio" name="optie" value="3"> optie 3: omg youre serious?
        <br>
        <input type="radio" name="optie" value="4"> optie 4: echt?
        <br>
        <br>
        <input type="submit" value="stem invoeren">
    </form>
</body>
</html>

