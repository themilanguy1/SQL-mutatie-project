<?php
if(isset($_POST['naam'])) {
    echo "Bedankt, uw bericht is verzonden.";
    echo "<br><br>";
    echo "Als u nog een boodschap achter wilt laten zal u later terug moeten komen op deze pagina.";

    $naam = $_POST['naam'];
    $bericht = $_POST['bericht'];

    include 'connect.php';

    $sql = "INSERT INTO gastenboek (naam, bericht)
    VALUES ('$naam', '$bericht')";
    
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();




} else { 
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gastenboek</title>
    </head>
    <style>
        .titel {
            margin: auto;
            margin-bottom: 1em;
        }
        textarea {
            width: 30%;
        }
    </style>
    <body>
        
    </body>
    </html>
        <h4 class="titel">Wij hopen dat uw verblijf prettig was.</h4> 
        <p>Zou u nog een boodschap achter willen laten in ons online gastenboek?</p>
        <br>

        <form method="post" action="" id="formulier">
            <p>Naam: <input type="text" name="naam"></p>    
        <p>Je bericht: </p>
        <textarea form="formulier" wrap="soft" rows="5" cols="10" name="bericht"></textarea>
            <input type="submit" value="opslaan">
        </form> 


    </html>

    <?php
}

?>




