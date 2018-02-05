<?php
require_once 'connect.php';

$sql = "DELETE FROM reservations WHERE invoice_number = ?";
if (!$result = $conn->prepare($sql)){
    die('Query failed: (' . $conn->errno . ') ' . $conn->error);
}

if (!$result->bind_param('i', $_GET['id'])){
    die('Binding parameters failed: (' . $result->errno . ') ' . $result->error);
}

if (!$result->execute()){
    die('Execute failed: (' . $result->errno . ') ' . $result->error);
}

if ($result->affected_rows > 0){
    header('Location: ../reserveringen.php');
}else{
    echo "Kan de factuur niet verwijderen.";
}
$result->close();
$conn->close();