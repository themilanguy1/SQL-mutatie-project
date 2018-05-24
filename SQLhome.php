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
                    <div class="row text-center">
                        <div class="col-xl-12">
                            <h4 id="tit1">Nieuwe stad invoeren:</h4>
                            <form id="stadform" method="POST" action="#stadweergave">
                                <div class="form-group">
                                    <label for="stadinvoer">Vul aub een stadnaam in</label>
                                    <input class="form-control" type="text" placeholder="stad" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
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
                            <form id="winkelform" method="post" action="#winkelweergave">
                                <div class="form-group">
                                    <label for="winkelinvoer">Vul aub een nieuwe winkel in</label>
                                    <input class="form-control" type="text" placeholder="winkel" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Invoeren</button>
                            </form>
                        </div>
                        <div class="tit2 col-xl-12" id="winkelweergave">
                            <?php
                            include 'connectlocal.php';

                            $sql = "SELECT winkel_id, winkel_naam FROM winkel";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table table.dark'> <th>winkel id</th> <th>winkel naam</th>";
                                    echo "<tr><td>".$row["winkel_id"]."</td><td>".$row["winkel_naam"]."</td><tr>";
                                    echo "</table>";
                                }
                            } else {
                                echo "Geen resulaten gevonden";
                            }
                            ?>

                        </div>
                        <div class="emptyspace col-xl-12">

                        </div>
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