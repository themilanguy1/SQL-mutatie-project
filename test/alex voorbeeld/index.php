<?php

    $conn = new mysqli(
        'localhost', 
        'root', 
        'as344444', 
        'Op7'
    );

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Stad Toevoegen
    if(isset($_POST['CityName']) && isset($_POST['Population'])) {
        $conn->query("INSERT INTO `stad` (`naam`, `populatie`) VALUES ('$_POST[CityName]', '$_POST[Population]')");
        header('location: index.php');
        die();
    }

    // Winkel toevoegen
    if(isset($_POST['WinkelID']) && isset($_POST['WinekName'])) {
        $conn->query("INSERT INTO `winkel` (`winkel_id`, `winkel_naam`) VALUES ('$_POST[WinkelID]', '$_POST[WinekName]')");
        header('location: index.php');
        die();
    }

    // Relatie Toevoegen
    if(isset($_POST['StadChoice']) && isset($_POST['WineklChoice']) && isset($_POST['Filialen'])) {
        $conn->query("INSERT INTO `stad_Winkel` (`stad_id`, `winkel_id`, `aantal_filialen`) VALUES ('$_POST[StadChoice]', '$_POST[WineklChoice]', '$_POST[Filialen]')");
        header('location: index.php');
        die();
    }

    //Verwijder Relatie
    if (isset($_GET['reldelS']) && isset($_GET['reldelW'])) {
        $conn->query("DELETE FROM `stad_winkel` WHERE `stad_id` = '$_GET[reldelS]' AND `winkel_id` = '$_GET[reldelW]'");
        header('location: index.php');
        die();
    }

    //Verwijder Winkel
    if (isset($_GET['winkelDel'])) {
        $conn->query("DELETE FROM `stad_winkel` WHERE `winkel_id` = '$_GET[winkelDel]'");
        $conn->query("DELETE FROM `winkel` WHERE `winkel_id` = '$_GET[winkelDel]'");
        header('location: index.php');
        die();
    }

    //Verwijder Stad
    if (isset($_GET['stadDel'])) {
        $conn->query("DELETE FROM `stad_winkel` WHERE `stad_id` = '$_GET[stadDel]'");
        $conn->query("DELETE FROM `stad` WHERE `stad_id` = '$_GET[stadDel]'");
        header('location: index.php');
        die();
    }

    //Update Stad
    if (isset($_POST['stadnaam']) && isset($_POST['populatie']) && isset($_POST['ID'])) {
        $conn->query("UPDATE `stad` SET `naam` = '$_POST[stadnaam]', `populatie` = '$_POST[populatie]' WHERE `stad`.`stad_id` = $_POST[ID];");
        header('location: index.php');
        die();
    }

    //Update Winkel
    if (isset($_POST['winkelID']) && isset($_POST['winkelnaam']) && isset($_POST['ID'])) {
        $conn->query("UPDATE `winkel` SET `winkel_id`='$_POST[winkelID]',`winkel_naam`='$_POST[winkelnaam]' WHERE `winkel_id`='$_POST[ID]'");
        $conn->query("UPDATE `stad_winkel` SET `winkel_id`='$_POST[winkelID]' WHERE `winkel_id`='$_POST[ID]'");
        header('location: index.php');
        die();
    }

    //Update Aantal filialen
    if (isset($_POST['Aantalfilialen']) && isset($_POST['stadID']) && isset($_POST['winkelID'])) {
        $conn->query("UPDATE `stad_winkel` SET `aantal_filialen`='$_POST[Aantalfilialen]' WHERE `stad_id`='$_POST[stadID]' AND `winkel_id`='$_POST[winkelID]'");
        header('location: index.php');
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Op h7</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-5">Opdracht H7</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Stad toevoegen</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Stad naam</label>
                        <input class="form-control" type="text" name="CityName" placeholder="Bruinisse..." require>
                    </div>
                    <div class="form-group">
                        <label>Populatie</label>
                        <input class="form-control" min="0" type="number" name="Population" require>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Stad toevoegen">
                </form>
            </div>
            <div class="col-sm-4">
                <h3>Winkel toevoegen</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Winkel id</label><br>
                        <input class="form-control" type="text" name="WinkelID" placeholder="jt" maxlength="2" require>
                        <small>Voorbeeld: Albert Heijn = ah, Hans Textiel = ht, Jumbo = ju</small>
                    </div>
                    <div class="form-group">
                        <label>Winkel naam</label>
                        <input class="form-control" type="text" name="WinekName" placeholder="Johnny taria..." require>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Winkel toevoegen">
                </form>
            </div>
            <div class="col-sm-4">
                <h3>Relatie toevoegen</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Stad naam</label>
                        <select class="form-control" name="StadChoice">
                            <option selected disabled>Kies een stad uit...</option>
                            <?php
                                $result = $conn->query('SELECT * FROM stad');

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='$row[stad_id]'>$row[naam]</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Winkel naam</label>
                        <select class="form-control" name="WineklChoice">
                            <option selected disabled>Kies een winkel uit...</option>
                            <?php
                                $result = $conn->query('SELECT * FROM winkel');

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='$row[winkel_id]'>$row[winkel_naam]</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Aantal filialen</label>
                        <input class="form-control" min="0" type="number" name="Filialen" require>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Relatie toevoegen">
                </form>
            </div>
            <div class="col-12">
                <h3>filialen per stad</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Stad</th>
                            <th>Winkel</th>
                            <th>Aantal filialen</th>
                            <th>verwijder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- //TODO add php query -->
                        <?php
                            $result = $conn->query('SELECT * FROM stad_winkel INNER JOIN stad ON stad.stad_id = stad_winkel.stad_id INNER JOIN winkel ON winkel.winkel_id = stad_winkel.winkel_id ORDER BY naam, winkel_naam;');

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>$row[naam], $row[populatie]<a href='' class='float-right' data-toggle='modal' data-target='#EditStad' data-id='$row[stad_id]' data-stad='$row[naam]' data-populatie='$row[populatie]'><i class='fas fa-edit'></i></a></td>" . 
                                    "<td>$row[winkel_id], $row[winkel_naam]<a href='' class='float-right' data-toggle='modal' data-target='#EditWinkel' data-winkel-id='$row[winkel_id]' data-winkel='$row[winkel_naam]'><i class='fas fa-edit'></i></a></td>" . 
                                    "<td>$row[aantal_filialen]<a href='' data-toggle='modal' data-target='#EditFilialen' data-filialen='$row[aantal_filialen]' data-winkel-id='$row[winkel_id]' data-stad-id='$row[stad_id]' class='float-right'><i class='fas fa-edit'></i></a></td>" . 
                                    "<td><a href='?reldelS=$row[stad_id]&reldelW=$row[winkel_id]'><i class='fas fa-trash'></i></a></td></tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EditStad" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Stad bewerken</h5>
                </div>
                <form action="" method="post">                 
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>Stadnaam</label>
                                    <input type="text" name="stadnaam" class="form-control" id="stadnaam">
                                </div>
                                <div class="col-6">
                                    <label>Populatie</label>
                                    <input type="number" name="populatie" class="form-control" id="populatie">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" name="ID" class="d-none" id="ID" value="">
                        <a href="" id="stadIDDel" class="btn btn-danger mr-auto">Verwijderen</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                        <input type="submit" class="btn btn-success" value="Bewerken">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditWinkel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Winkel bewerken</h5>
                </div>
                <form action="" method="post">                 
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label>Winkel ID</label>
                                    <input type="text" name="winkelID" class="form-control" id="winkelID">
                                </div>
                                <div class="col-8">
                                    <label>Winkel naam</label>
                                    <input type="text" name="winkelnaam" class="form-control" id="winkelnaam">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" name="ID" class="d-none" id="ID" value="">
                        <a href="?winkelDel=" id="winkelIDDel" class="btn btn-danger mr-auto">Verwijderen</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                        <input type="submit" class="btn btn-success" value="Bewerken">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditFilialen" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Winkel bewerken</h5>
                </div>
                <form action="" method="post">                 
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label>Aantal filialen</label>
                                    <input type="number" name="Aantalfilialen" class="form-control" id="filialen">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" name="stadID" class="d-none" id="stadID" value="">
                        <input type="text" name="winkelID" class="d-none" id="winkelID" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                        <input type="submit" class="btn btn-success" value="Bewerken">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('#EditStad').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id'),
                stad = button.data('stad'),
                populatie = button.data('populatie')
            
            var modal = $(this)
            modal.find('#stadIDDel').attr("href", "?stadDel=" + id)
            modal.find('#stadnaam').val(stad);
            modal.find('#populatie').val(populatie);
            modal.find('#ID').val(id);
        });
        $('#EditWinkel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var winkel = button.data('winkel'),
                winkelID = button.data('winkel-id')
            
            var modal = $(this)
            modal.find('#winkelIDDel').attr("href", "?winkelDel=" + winkelID)
            modal.find('#winkelnaam').val(winkel);
            modal.find('#ID').val(winkelID);
            modal.find('#winkelID').val(winkelID);
        });
        $('#EditFilialen').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var filialen = button.data('filialen');
            var winkelID = button.data('winkel-id');
            var stadID = button.data('stad-id');
            
            var modal = $(this)
            modal.find('#filialen').val(filialen);
            modal.find('#stadID').val(stadID);
            modal.find('#winkelID').val(winkelID);
        });
    </script>
</body>
</html>