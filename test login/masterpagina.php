<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
            width: 100px;
        }
    </style>
</head>
<body>
    <div>
        <?php
            try {
                $db = new PDO("mysql:host=localhost; dbname=deb43619_milan", "deb43619_milan", "MlG199713");
                $query = $db->prepare("SELECT * FROM  fietsen");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo "<table>";
                    foreach($result as &$data) {
                        echo "<tr>";
                            echo "<td>" . $data['merk'] . "</td>";
                            echo "<td>" . $data['type'] . "</td>";
                            echo "<td> &euro; " . number_format($data["prijs"], 2, ",", ".") . "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            } catch(PDOException $e) {
                die("Error!: " . $e->getMessage());
            }
        ?>
        <?php
            try {
                $db = new PDO("mysql:host=localhost; dbname=deb43619_milan", "deb43619_milan", "MlG199713");
                $query = $db->prepare("SELECT * FROM  fietsen");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as &$data) {
                        echo "<a href='detailpagina.php?id=" . $data['id'] . "'>";
                            echo $data["merk"] . " " . $data["type"];
                        echo "</a>";
                        echo "<br>";
                    }
            } catch(PDOException $e) {
                die("Error!: " . $e->getMessage());
            }
        ?>
    </div>
</body>
</html>