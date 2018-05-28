<?php
    try {
        $db = new PDO("mysql:host=localhost; dbname=deb43619_milan", "deb43619_milan", "MlG199713");
        $query = $db->prepare("SELECT * FROM  fietsen WHERE id = " . $_GET['id']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo "Artikelnummer: " . $data['id'] . "<br>";
                echo "Merk: " . $data['merk'] . "<br>";
                echo "Type: " . $data['type'] . "<br>";
                echo "Prijs: &euro; " . number_format($data['prijs'], 2, ",", ".") . "<br><br>";
            }
    } catch(PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
?>
<a href="masterpagina.php"> Terug </a>