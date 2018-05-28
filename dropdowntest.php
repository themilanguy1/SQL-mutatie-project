<?php
include 'connectlocal.php';
$table = "stad";
$result = $conn->query("SELECT * FROM $table");

    echo "<select name='id'>";

    while ($row = $result->fetch_assoc()) {
        unset($stad_id, $stad_naam);
        $id = $row['stad_id'];
        $naam = $row['stad_naam']; 
        echo '<option value="'.$id.'">'.$naam.'</option>';  
} echo "</select>";

?>
