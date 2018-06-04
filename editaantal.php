<?php
include 'connect.php';
include 'functions.php';

if(ISSET($_GET['id'])) {
    //define id for use
    $id = $_GET['id'];
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
                <h4 id="tit1">Winkel/afkorting wijzigen:</h4>
                <form id="editwinkelform" method="POST" action="SQLhome.php?aantal_update_id=<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Wijzig het aantal filialen van <?php 
                        $sql = "SELECT stad_winkel.winkel_afkorting, stad.stad_naam, winkel.winkel_naam 
                                FROM ((stad_winkel 
                                INNER JOIN stad ON stad_winkel.stad_id = stad.stad_id)
                                INNER JOIN winkel ON stad_winkel.winkel_afkorting = winkel.winkel_afkorting)
                                WHERE aantal_id = ". $id. "";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { 
                            while($row = mysqli_fetch_assoc($result)) {
                                echo $row['winkel_naam'];
                                echo " in ";
                                echo $row['stad_naam'];
                            }
                        }
                        ?>
                        </label>
                        <input name="aantalnummerinput2" class="form-control" type="number" value="<?php 
                                $sql = "SELECT aantal_filialen FROM stad_winkel WHERE aantal_id = ". $id. "";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo $row['aantal_filialen']; 
                                    }
                                }
                            ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Wijziging bevestigen</button>
                    <a href="SQLhome.php"><button type="button" class="btn btn-primary">Annuleren</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

