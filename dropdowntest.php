<?php
include 'connectlocal.php';
$table = "stad";

$result = $conn->query("SELECT * FROM $table");

    echo "<html>";
    echo "<body>";
    echo "<select name='id'>";

    while ($row = $result->fetch_assoc()) {

        unset($stad_id, $stad_naam);
        $id = $row['stad_id'];
        $name = $row['stad_naam']; 
        echo '<option value="'.$id.'">'.$name.'</option>';
                 
}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?>
