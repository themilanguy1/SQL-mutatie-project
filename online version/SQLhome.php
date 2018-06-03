<?php 
    include 'connect.php'; 
    include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Mutatie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
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
                            <form id="stadform" method="POST" action="addstad.php">
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
                                    echo "<tr> <td>".$row["stad_naam"]."</td> <td>".$row["populatie"]."</td> <td><a style='font-size: 25px;' class='fas fa-edit' href='editstad.php?id=".$row["stad_id"]."'></a></td> <td><a style='font-size: 25px;' class='fas fa-trash-alt' href='deletestad.php?id=".$row["stad_id"]."'></a></td> </tr>";
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
                            <form id="winkelform" method="post" action="addwinkel.php">
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
                                    echo "<tr> <td>".$row["winkel_afkorting"]."</td> <td>".$row["winkel_naam"]."</td> <td><a style='font-size: 25px;' class='fas fa-edit' href='editwinkel.php?id=".$row["winkel_id"]."'></a></td> <td><a style='font-size: 25px;' class='fas fa-trash-alt' href='deletewinkel.php?id=".$row["winkel_id"]."'></a></td> </tr>";
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
                            <form id="aantalform" method="post" action="addaantal.php">
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
                                    echo "<tr> <td scope='row'>".$row["stad_naam"]."</td><td>".$row["winkel_naam"]."</td><td>".$row["aantal_filialen"]."</td> <td><a style='font-size: 25px;' class='fas fa-edit' href='editaantal.php?id=".$row["aantal_id"]."'></a></td> <td><a style='font-size: 25px;' class='fas fa-trash-alt' href='deleteaantal.php?id=".$row["aantal_id"]."'></a></td> </tr>";
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