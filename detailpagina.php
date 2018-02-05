<?php
//include session.php for login session!
require_once ("include/connect.php");
//include session.php for login session!
include 'include/session.php';

//ophalen productgegevens!
if(isset($_GET['car_id'])) {
    $id = $_GET['car_id'];
}else{
    header('Location: index.php'); //word weer doorgestruurd na index.php als er geen product is geselecteerd
}

//Haalt de gegevens van het product op uit de Database!
$query=mysqli_query($conn,"select * from cars WHERE car_id = $id");
while($ft=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-a-car-project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navbar-by-Aaron.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php
        include 'include/navbar.php';
    ?>
    <div class="simple-slider"></div>
    <div></div>
    <div class="article-list"></div>
    <div class="article-list"></div>
    <div class="article-dual-column"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Auto informatie</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><span>Home</span></a></li>
                        <li><a href="overzichtspagina.php"><span>Overzicht </span></a></li>
                        <li><a href="detailpagina.php?car_id=<?php echo $ft['car_id'];?>"><span><?php echo $ft['brand'];?> <?php echo $ft['model'];?></span></a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6"><img class="img-responsive" src="<?php if ($ft['image_name'] == NULL){ echo "http://placehold.it/350x200/333333/FFFFFF";} else { ?>car_images/<?php echo $ft['image_name'];}?>" style="width:579px;height:312px;"></div>
                <div class="col-md-6">
                    <h1><strong><?php echo $ft['brand'];?> <?php echo $ft['model'];?></strong></h1>
                </div>
                <div class="col-md-6">
                    <h1> € <?php echo $ft['day_price'];?>,- </h1>
                    <h3>per dag</h3><button class="btn btn-primary" type="submit" style="width:290px;margin:30px;padding:13px;">Reserveer nu!</button></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3><strong>Beschrijving: </strong></h3>
                    <h4 style="font-size:20px;"><?php echo $ft['description'];?></h4>
                </div>
                <div class="col-md-6">
                    <h3><strong>Specificaties: </strong></h3>
                    <p>Merk: <?php echo $ft['brand'];?></p>
                    <p>Type: <?php echo $ft['model'];?></p>
                    <p>Model: <?php echo $ft['car_type'];?></p>
                    <p>Versnelling: <?php echo $ft['acceleration'];?></p>
                    <p>Prijs per dag: € <?php echo $ft['day_price'];?>,- incl. BTW</p>
                    <p>Kentekennummer: <?php echo $ft['licence_plate'];?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'include/footer.php';
    ?>
    <div class="article-list"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
    <?php
}
?>