<?php
require_once 'connect.php';

// Checks the database connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Gets the data and converts strange characters
$brand = mysqli_real_escape_string($conn, $_REQUEST['brand']);
$model = mysqli_real_escape_string($conn, $_REQUEST['model']);
$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
$licence_plate = mysqli_real_escape_string($conn, $_REQUEST['licence_plate']);
$car_type = mysqli_real_escape_string($conn, $_REQUEST['car_type']);
$day_price = mysqli_real_escape_string($conn, $_REQUEST['day_price']);
$acceleration = mysqli_real_escape_string($conn, $_REQUEST['acceleration']);
$image_name = mysqli_real_escape_string($conn, $_REQUEST['image_name']);

// adds data to the database
$sql = "INSERT INTO cars (brand, model, description, licence_plate, car_type, day_price, acceleration, image_name)
VALUES ('$brand', '$model', '$description', '$licence_plate', '$car_type', '$day_price', '$acceleration', '$image_name')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// closes the mysql connection
mysqli_close($conn);

// gets redirected to the index.php
header('Location: ../lijstauto.php'); 
?>
