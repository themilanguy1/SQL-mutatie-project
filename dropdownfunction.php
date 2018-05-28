<?php
include 'connectlocal.php';
function dropdownmenu ($tabel, $idinput, $naaminput) {
    include 'connectlocal.php';
    $result = $conn->query("SELECT * FROM $tabel");

    while ($row = $result->fetch_assoc()) {
        $id = $row["$idinput"];
        $naam= $row["$naaminput"];
        echo '<option value="'.$id.'">'.$naam.'</option>';  
    }
}



