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

function redirect($link) {
    echo '<script type="text/javascript">';
    echo 'window.location.href='.$link.';';
    echo '</script>';   
}