<?php
function dropdownmenu($tabel, $idinput, $naaminput, $order) {
    include 'connect.php';
    $result = $conn->query("SELECT * FROM $tabel ORDER BY $order");

    while ($row = $result->fetch_assoc()) {
        $id = $row["$idinput"];
        $naam= $row["$naaminput"];
        echo '<option value="'.$id.'">'.$naam.'</option>';  
    }
}
