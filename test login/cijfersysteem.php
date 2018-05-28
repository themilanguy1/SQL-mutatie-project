<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cijfersysteem</title>
    <style>
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
    <?php
        try {
            $db = new PDO("mysql:host=localhost; dbname=deb43619_milan", "deb43619_milan", "MlG199713");
            $query = $db->prepare("SELECT * FROM  cijfersysteem");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            echo "<table>";
                foreach($result as &$data) {
                    echo "<tr>";
                        echo "<td>" . $data['leerling'] . "</td>";
                        echo "<td>" . $data['cijfer'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        } catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }

    ?>
</body>
</html>