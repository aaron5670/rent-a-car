<?php
require_once 'connect.php';

//include session.php for login session!
include 'session.php';



// Checks the database connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Haalt de gegevens op en zet rare tekens om.
$car_id = $_REQUEST['car_id'];
$begin_date = mysqli_real_escape_string($conn, $_REQUEST['begin_date']);
$end_date = mysqli_real_escape_string($conn, $_REQUEST['end_date']);
$time = mysqli_real_escape_string($conn, $_REQUEST['time']);

$userID = $_REQUEST['user_id'];

// Adds the data to the database
$sql = "INSERT INTO reservations (car_id, begin_date, end_date, time)
VALUES ('$car_id', '$begin_date', '$end_date', '$time')";

//Laatste id
$lastID = mysqli_insert_id($conn);



if(mysqli_query($conn, $sql)){
    //Laatste id
$lastID = mysqli_insert_id($conn);
    echo "Record1 added successfully.";

    // Adds the data to the database
    $sql = "INSERT INTO invoice (invoice_number, user_id)
    VALUES ('$lastID', '$userID')";
    
    if(mysqli_query($conn, $sql)){
        echo "Record2 added successfully.";
    } else{
        echo "ERROR2 : Could not able to execute $sql. " . mysqli_error($conn);
    }
} else{
    echo "ERROR1 : Could not able to execute $sql. " . mysqli_error($conn);
}



// Closes the mysql connection
mysqli_close($conn);

// gets redirected to index.php
header('Location: ../account.php');


?>
