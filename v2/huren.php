<?php
//include session.php for login session!
require_once ("include/connect.php");
//include session.php for login session!
include 'include/session.php';

//ophalen productgegevens!
if(isset($_GET['car_id'])) {
    $carID = $_GET['car_id'];
}else{
    header('Location: index.php'); //word weer doorgestruurd na index.php als er geen product is geselecteerd
}

//Checkt of de gebruiker is ingelogt
if(isset($sessData['userLoggedIn'])) {
    $userID = $sessData['userID'];
}else{
    header("Location: inloggen.php");
}


//Haalt de gegevens van het product op uit de Database!
$query=mysqli_query($conn,"SELECT * FROM cars WHERE car_id = $carID");
while($ft=mysqli_fetch_array($query)) {

//Haalt de gegevens van de user op uit de Database!
$userQuery=mysqli_query($conn,"SELECT * FROM users WHERE user_id = $userID");
while($uq=mysqli_fetch_array($userQuery)) {
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-a-car-project</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navbar-by-Aaron.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <!-- KALENDER & jQuery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="include/datepicker.js"></script>
</head>

<body>
    <?php
    // includes the navigation bar into the page
        include 'include/navbar.php';
    ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Auto huren</h1>
                    <img class="img-responsive" src="<?php if ($ft['image_name'] == NULL){ echo "http://placehold.it/350x200/333333/FFFFFF";} else { ?>car_images/<?php echo $ft['image_name'];}?>">
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <div class="container">
            <form action="include/reservationAction.php" method="post">
                <input name="car_id" type="hidden" value="<?php echo $carID; ?>">
                <input name="user_id" type="hidden" value="<?php echo $userID; ?>">
                <div class="row">
                    <!--Data from the car-->
                    <div class="col-md-6">
                        <h3><?php echo $ft['brand'];?> <?php echo $ft['model'];?></h3>
                        <h4>€<?php echo $ft['day_price'];?>,- per dag</h4>
                        <p><?php echo $ft['description'];?></p>
                        <h4>Ophaaldatum</h4>
                        <input type="text" name="begin_date" id="from" value="2018-01-26">
                        <h4>Inleverdatum</h4>
                        <input type="text" name="end_date" id="to" value="2018-01-29">
                        <h4>Tijd </h4>
                        <small>U kunt op werkdagen tussen 09:00 en 17:00 de auto ophalen!</small><br />
                        <input type="time" name="time" value="12:30">
                        <h4>Merk </h4>
                        <p><?php echo $ft['brand'];?> </p>
                        <h4>Type </h4>
                        <p><?php echo $ft['model'];?></p>
                        <h4>Model </h4>
                        <p><?php echo $ft['car_type'];?> </p>
                        <h4>Versnelling </h4>
                        <p><?php echo $ft['acceleration'];?> </p>
                        <h4>Prijs per dag</h4>
                        <p>€<?php echo $ft['day_price'];?>,- per dag</p>
                        <h4>Kenteken </h4>
                        <p><?php echo $ft['licence_plate'];?></p>
                    </div>
                    
                    <!--Data from the customer himself-->
                    <div class="col-md-6">
                        <h3>Uw gegevens</h3>
                        <h4>Naam:</h4>
                        <p><?php echo $uq['first_name'];?> <?php echo $uq['last_name'];?></p>
                        <h4>E-mail: </h4>
                        <p><?php echo $uq['email'];?></p>
                        <h4>Adres </h4>
                        <p><?php echo $uq['street'];?></p>
                        <h4>Postcode:</h4>
                        <p><?php echo $uq['zipcode'];?></p>
                        <h4>Provincie: </h4>
                        <p><?php echo $uq['province'];?></p>
                        <h4>Land: </h4>
                        <p><?php echo $uq['country'];?></p>
                        <h4>Telefoonnummer: </h4>
                        <p><?php echo $uq['phone'];?></p>
                    </div>
                        <button type="submit" class="btn btn-primary" action="test()" name="go">Bevestigen en huren!</button>
                </div>
            </form>
        </div>
    </div>
    <div></div>
    <?php
    // includes the footer into the page
        include 'include/footer.php'
    ?>
    <!--<script src="assets/js/jquery.min.js"></script>-->
    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>-->
    <!--<script src="assets/js/Simple-Slider.js"></script>-->
</body>

</html>
    <?php
    }
}
?>