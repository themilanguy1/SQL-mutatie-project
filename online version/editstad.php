<?php
include 'connect.php';
include 'functions.php';

if(ISSET($_GET['id'])) {
    //define id for use
    $id = $_GET['id'];

    //select placeholder data for update form
    $sql = "SELECT * FROM stad WHERE stad_id = ". $id. "";
    $result = mysqli_query($conn, $sql);
} else {
    //send to home if get is not set
    header("Location: SQLhome.php");  
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="SQLmutatie.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h4 id="tit1">Stad/populatie wijzigen:</h4>
                <form id="editstadform" method="POST" action="">
                    <div class="form-group">
                        <label>Wijzig de stadnaam</label>
                        <input name="stadnaaminput" class="form-control" type="text" placeholder="<?php 
                                if (mysqli_num_rows($result) > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo $row['stad_naam']; 
                                    }
                                }
                            ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Wijzig de populatie van de stad</label>
                        <input name="stadpopinput" class="form-control" type="number" placeholder="<?php 
                                
                                //for some reason this doesnt work quite yet
                                if (mysqli_num_rows($result) > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo $row['populatie']; 
                                    }
                                }
                            ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Wijziging bevestigen</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// if(ISSET($_GET['id'])) {
//     $id = $_GET['id'];

//     $sql = "UPDATE stad SET stad_naam, populatie='$stadnaam', '$populatie' WHERE id=" . $id. ";

//     if ($conn->query($sql) === TRUE) {
//         echo "Record updated successfully";
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }
    
//     $conn->close();
// }
