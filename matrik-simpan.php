<?php
require "include/conn.php";

$id_alternative = $_POST['id_alternative'];

for ($i = 1; $i <= 5; $i++) {
    $criteria = $_POST['criteria_' . $i];
    $values[] = "('$id_alternative', '$i', '$criteria')";
}

$valuesString = implode(', ', $values);

$sql = "INSERT INTO saw_evaluations (id_alternative, id_criteria, value) VALUES $valuesString";
$result = $db->query($sql);

if ($result === true) {
    header("location:./matrik.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
