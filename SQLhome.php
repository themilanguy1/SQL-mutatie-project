<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Mutatie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
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
            <div class="tab-pane fade show active" id="stad" role="tabpanel" aria-labelledby="stad-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 id="tit1">Nieuwe stad invoeren:</h4>
                            <form id="stadform" method="POST" action="stadtoevoegen.php">
                                <div class="form-group">
                                    <label for="stadinvoer">Vul aub een stadnaam in</label>
                                    <input name="stadnaaminput" class="form-control" type="text" placeholder="stad" required>
                                </div>
                                <div class="form-group">
                                    <label for="populatieinvoer">Vul aub de populatie van de stad in</label>
                                    <input name="stadpopinput" class="form-control" type="number" placeholder="populatie" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
                    </div>
                    <div class="weergavediv" id="stadweergave">

                        <?php
                        include 'connectlocal.php';

                        $sql = "SELECT stad_id, naam, populatie FROM stad";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<table class='table'> <thead> <tr> <th scope='col'>stad_id</th> <th scope='col'>stad</th> <th scope='col'>populatie</th> </tr> </thead> <tbody>";
                                echo "<tr><th scope='row'>".$row["stad_id"]."</th><td>".$row["naam"]."</td><td>".$row["populatie"]."</td><tr>";
                                echo "</tbody></table>";
                            }
                        } else {
                            echo "Geen resulaten gevonden";
                        }
                        ?>

                    </div>
                    <div class="emptyspace">

                    </div>
                </div>
            </div>
        
            <!-- winkel tab -->
            <div class="tab-pane fade" id="winkel" role="tabpanel" aria-labelledby="winkel-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 id="tit1">Nieuwe winkel invoeren:</h4>
                        </div>
                        <div class="col-xl-12">
                            <form id="winkelform" method="post" action="winkeltoevoegen.php">
                                <div class="form-group">
                                    <label for="winkelinvoer">Vul aub een nieuwe winkel in</label>
                                    <input name="winkelnaaminput" class="form-control" type="text" placeholder="winkel" required>
                                </div>
                                <div class="form-group">
                                    <label for="winkelinvoer">Vul een afkorting in voor de winkel. <br> Vb: Albert Heijn = ah.</label>
                                    <input name="winkelafkortinginput" class="form-control" type="text" placeholder="afkorting" required>
                                    <small id="winkelnotice" class="form-text text-muted">Let op: afkorting mag max 2 karakters zijn.</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
                    </div>
                    <div class="weergavediv" id="winkelweergave">
                        <?php
                        include 'connectlocal.php';

                        $sql = "SELECT winkel_id, winkel_naam FROM winkel";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<table class='table'> <thead> <tr> <th scope='col'>winkel id</th> <th scope='col'>winkel naam</th> </tr> </thead> <tbody>";
                                echo "<tr><td>".$row["winkel_id"]."</td><td>".$row["winkel_naam"]."</td><tr>";
                                echo "</tbody></table>";
                            }
                        } else {
                            echo "Geen resulaten gevonden";
                        }
                        ?>

                    </div>
                    <div class="emptyspace">

                    </div>
                </div>
            </div>

            <!-- aantal tab -->
            <div class="tab-pane fade" id="aantal" role="tabpanel" aria-labelledby="aantal-tab">
                <p>AANTAL TEST</p>
            </div>
        </div>
    </div>
    <!-- javascript -->
    <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>