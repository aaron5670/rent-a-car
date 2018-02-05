<?php
//include database connection
require_once 'include/connect.php';

//include session.php for login session!
include 'include/session.php';
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
    <div>
        <div class="container">
            <div class="row">
                <!-- GRID VAN ALLE PRODUCTEN! -->
                <?php
                $query=mysqli_query($conn,"select * from cars");
                while($ft = mysqli_fetch_array($query)) {
                    //dit is voor de link naar de productpagina!
                    $id = $ft['car_id'];
                ?>
                    <div class="col-md-4"><img class="img-responsive" src="<?php if ($ft['image_name'] == NULL){ echo "http://placehold.it/350x200/333333/FFFFFF";} else { ?>car_images/<?php echo $ft['image_name'];}?>">
                        <h3 class="text-center name"><?php echo $ft['brand']; ?> <?php echo $ft['model']; ?></h3>
                        <p class="text-center description" style="font-size:22px;"><strong>€<?php echo $ft['day_price']; ?>,-</strong> </p>
                        <p class="text-center description" style="font-size:17px;">Per dag</p>
                        <p class="text-center description" style="font-size:15px;"><?php echo $ft['description']; ?>
                            <a href="detailpagina.php?car_id=<?php echo $id ?>">><button class="btn btn-primary" type="submit" style="width:288px;margin:5px;">Reserveer nu!</button></a></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
        include 'include/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>