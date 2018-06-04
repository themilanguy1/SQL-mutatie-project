<?php 
    include 'connect.php'; 
    include 'functions.php';
?>

<?php
//stadinvoer
if(isset($_POST['stadnaaminput'])) {
    $stad = ucfirst($_POST['stadnaaminput']);
    $query = mysqli_query($conn, "SELECT stad_naam FROM stad WHERE stad_naam='".$stad."'");
        if (!$query) {
            die('Error: ' . mysqli_error($conn));
        }
    //check of stad al bestaat
    if(mysqli_num_rows($query) > 0){
        header('Location: error.php?error=stad');
        } else {
            $pop = $_POST['stadpopinput'];
            //alternatief voor AI bij database
            $sql3 = mysqli_query($conn, "SELECT MAX(stad_id) FROM stad");
            if(mysqli_num_rows($sql3) > 0) {
                while($row = mysqli_fetch_assoc($sql3)) { 
                    $stad_id = $row['MAX(stad_id)'] + 1;
                }
            }
    
            $sql = "INSERT INTO stad (stad_id, stad_naam, populatie)
            VALUES ('$stad_id', '$stad', '$pop')";
            
            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "";
            }
    }
}
?>

<?php
//winkelinvoer
if(isset($_POST['winkelnaaminput'])) {
    $winkelnaam = ucfirst($_POST['winkelnaaminput']);
    $query = mysqli_query($conn, "SELECT winkel_naam FROM winkel WHERE winkel_naam='".$winkelnaam."'");
        if (!$query) {
            die('Error: ' . mysqli_error($conn));
        }
    //check of winkel al bestaat
    if(mysqli_num_rows($query) > 0){
        header('Location: error.php?error=winkel');
        } else {
            $winkelafkorting = $_POST['winkelafkortinginput'];
            $sql = "INSERT INTO winkel (winkel_afkorting, winkel_naam)
            VALUES ('$winkelafkorting', '$winkelnaam')";
            
            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "";
            }
    }
}
?>

<?php
//aantalfilialeninvoer
if(isset($_POST['aantalstadinput'])) {
    $stad = $_POST['aantalstadinput'];
    $winkel = $_POST['aantalwinkelinput'];
    $query = mysqli_query($conn, "SELECT stad_id, winkel_afkorting FROM stad_winkel WHERE stad_id='".$stad."' AND winkel_afkorting ='".$winkel."' ");
        if (!$query) {
            die('Error: ' . mysqli_error($conn));
        }
    //check of connectie tussen stad en winkel al bestaat
    if(mysqli_num_rows($query) > 0){
        header('Location: error.php?error=filialen');
        } else {
            $aantal = $_POST['aantalnummerinput'];
            $sql = "INSERT INTO stad_winkel (stad_id, winkel_afkorting, aantal_filialen)
            VALUES ('$stad', '$winkel', '$aantal')";
    
            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "";
            }
    }
}
?>

<?php
    //wijzig stad
    if(ISSET($_GET['stad_update_id'])) {
        //define id for use
        $stad_update_id = $_GET['stad_update_id'];
    }
    if(isset($_POST['stadnaaminput2'])) {
        $stadnaam = ucfirst($_POST['stadnaaminput2']);
        $populatie = $_POST['stadpopinput2'];
        $sql = "UPDATE stad 
                SET stad_naam = '$stadnaam', 
                populatie= '$populatie' 
                WHERE stad_id=$stad_update_id";
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "";
        }
    }
?>

<?php
    if(ISSET($_GET['winkel_update_id'])) {
        //define id for use
        $winkel_update_id = $_GET['winkel_update_id'];
    }
    //wijzig winkel
    if(isset($_POST['winkelnaaminput2'])) {
        $winkelnaam = ucfirst($_POST['winkelnaaminput2']);
        $winkelafkorting = $_POST['winkelafkortinginput2'];
        $sql = "UPDATE winkel 
                SET winkel_naam = '$winkelnaam', 
                winkel_afkorting= '$winkelafkorting' 
                WHERE winkel_id= '$winkel_update_id'";
    
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "";
        }
    }
?>

<?php
    if(ISSET($_GET['aantal_update_id'])) {
        //define id for use
        $aantal_update_id = $_GET['aantal_update_id'];
    }
    if(isset($_POST['aantalnummerinput2'])) {
        $aantal = ucfirst($_POST['aantalnummerinput2']);
        $sql = "UPDATE stad_winkel 
                SET aantal_filialen = '$aantal'
                WHERE aantal_id='$aantal_update_id'";
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "";
        }
    }
?>

<?php
//stad verwijderen
if(isset($_GET['delete_stad_id'])) {
    mysqli_query($conn,"DELETE FROM `stad` WHERE stad_id = " . $_GET["delete_stad_id"]);
    header('location: SQLhome.php');
}
?>

<?php
//winkel verwijderen
if(isset($_GET['delete_winkel_id'])) {
    mysqli_query($conn,"DELETE FROM `winkel` WHERE winkel_id = " . $_GET["delete_winkel_id"]);\
    header('location: SQLhome.php');
}
?>

<?php
//aantal filialen verwijderen
if(isset($_GET['delete_aantal_id'])) {
    mysqli_query($conn,"DELETE FROM `stad_winkel` WHERE aantal_id = " . $_GET["delete_aantal_id"]);
    header('location: SQLhome.php');
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Mutatie</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="SQLmutatie.css">
</head>
<body>
    <h3 class="titmain text-center">SQL Mutatie</h3>
    
    <!-- tabswitcher -->
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="stad-tab" data-toggle="tab" href="#stad" role="tab" aria-controls="stad" aria-selected="true">Stad</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="winkel-tab" data-toggle="tab" href="#winkel" role="tab" aria-controls="winkel" aria-selected="false">Winkel</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="aantal-tab" data-toggle="tab" href="#aantal" role="tab" aria-controls="aantal" aria-selected="false">Aantal</a>
            </li>
        </ul>
    
        <!-- Stad tab -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="stad" role="tabpanel" aria-labelledby="stad-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 id="tit1">Nieuwe stad invoeren:</h4>
                            <form id="stadform" method="POST" action="">
                                <div class="form-group">
                                    <label>Vul een stadnaam in</label>
                                    <input name="stadnaaminput" class="form-control" type="text" placeholder="stad" required>
                                </div>
                                <div class="form-group">
                                    <label>Vul de populatie van de stad in</label>
                                    <input name="stadpopinput" class="form-control" type="number" placeholder="populatie" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
                    </div>
                    <div class="weergavediv" id="stadweergave">
                        <?php
                            $sql = "SELECT * FROM stad";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table'> <thead> <tr> <th scope='col'>stad</th> <th scope='col'>populatie</th> <th scope='col'>Wijzig</th> <th scope='col'>Verwijder</th> </tr> </thead> <tbody>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>".$row["stad_naam"]."</td> <td>".$row["populatie"]."</td> <td><a style='font-size: 25px;' class='fas fa-edit' href='editstad.php?id=".$row["stad_id"]."'></a></td> <td><a style='font-size: 25px;' class='fas fa-trash-alt' href='?delete_stad_id=".$row["stad_id"]."'></a></td> </tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "Geen resulaten gevonden";
                            }
                        ?>
                    </div>
                </div>
            </div>
        
            <!-- winkel tab -->
            <div class="tab-pane" id="winkel" role="tabpanel" aria-labelledby="winkel-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 id="tit1">Nieuwe winkel invoeren:</h4>
                        </div>
                        <div class="col-xl-12">
                            <form id="winkelform" method="post" action="">
                                <div class="form-group">
                                    <label>Vul een nieuwe winkel in</label>
                                    <input name="winkelnaaminput" class="form-control" type="text" placeholder="winkel" required>
                                </div>
                                <div class="form-group">
                                    <label>Vul een afkorting in voor de winkel<br>Vb: Albert Heijn = ah</label>
                                    <input name="winkelafkortinginput" class="form-control" type="text" placeholder="afkorting" required>
                                    <small id="winkelnotice" class="form-text text-muted">Let op: afkorting moet 2 karakters zijn.</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
                    </div>
                    <div class="weergavediv" id="winkelweergave">
                        <?php
                            $sql = "SELECT * FROM winkel";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table'> <thead> <tr> <th scope='col'>winkel afkorting</th> <th scope='col'>winkel naam</th> <th scope='col'>Wijzig</th> <th scope='col'>Verwijder</th> </tr> </thead> <tbody>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>".$row["winkel_afkorting"]."</td> <td>".$row["winkel_naam"]."</td> <td><a style='font-size: 25px;' class='fas fa-edit' href='editwinkel.php?id=".$row["winkel_id"]."'></a></td> <td><a style='font-size: 25px;' class='fas fa-trash-alt' href='?delete_winkel_id=".$row["winkel_id"]."'></a></td> </tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "Geen resulaten gevonden";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <!-- aantal tab -->
            <div class="tab-pane" id="aantal" role="tabpanel" aria-labelledby="aantal-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 id="tit1">Aantal filialen wijzigen:</h4>
                        </div>
                        <div class="col-xl-12">
                            <form id="aantalform" method="post" action="">
                                <div class="form-group">
                                    <label>Kies een stad</label>
                                    <select name="aantalstadinput" class="form-control" required>
                                        <?php dropdownmenu ("stad", "stad_id", "stad_naam"); ?>
                                    </select>   
                                </div>
                                <div class="form-group">
                                    <label>Kies een winkel<br></label>
                                    <select name="aantalwinkelinput" class="form-control" required>
                                        <?php dropdownmenu ("winkel", "winkel_afkorting", "winkel_naam"); ?>                                         
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label>Vul het aantal filialen in</label>
                                    <input name="aantalnummerinput" class="form-control" type="number" placeholder="aantal" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
                    </div>
                    <div class="weergavediv" id="winkelweergave">
                        <?php
                            $sql = "SELECT *, stad_winkel.winkel_afkorting, stad.stad_naam, winkel.winkel_naam 
                            FROM ((stad_winkel 
                            INNER JOIN stad ON stad_winkel.stad_id = stad.stad_id)
                            INNER JOIN winkel ON stad_winkel.winkel_afkorting = winkel.winkel_afkorting)";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table'> <thead> <tr> <th scope='col'>stad</th> <th scope='col'>winkel</th> <th scope='col'>aantal filialen</th> <th scope='col'>Wijzig</th> <th scope='col'>Verwijder</th> </tr> </thead> <tbody>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td scope='row'>".$row["stad_naam"]."</td><td>".$row["winkel_naam"]."</td><td>".$row["aantal_filialen"]."</td> <td><a style='font-size: 25px;' class='fas fa-edit' href='editaantal.php?id=".$row["aantal_id"]."'></a></td> <td><a style='font-size: 25px;' class='fas fa-trash-alt' href='?delete_aantal_id=".$row["aantal_id"]."'></a></td> </tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "Geen resulaten gevonden";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- javascript -->
    <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>