<?php
function dropdownmenu($tabel, $idinput, $naaminput) {
    include 'connect.php';
    $result = $conn->query("SELECT * FROM $tabel");

    while ($row = $result->fetch_assoc()) {
        $id = $row["$idinput"];
        $naam= $row["$naaminput"];
        echo '<option value="'.$id.'">'.$naam.'</option>';  
    }
}

// function placeholder($table, $column, $id) {
//     include 'connect.php';
//     $result = $conn->query("SELECT $column FROM $table WHERE $table."_id = ");
// }