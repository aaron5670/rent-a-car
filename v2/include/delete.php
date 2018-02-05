<?php
require_once 'connect.php';

$sql = "DELETE FROM cars WHERE car_id = ?";
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
    //echo "Product verwijderd bij ID.";
    header('Location: ../lijstauto.php');
}else{
    echo "Kan de auto niet verwijderen.";
}
$result->close();
$conn->close();