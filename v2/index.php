<?php
//include database connection
require_once 'include/connect.php';
//include session.php for login session!
include 'include/session.php';
?>
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
  

  
    <div class="simple-slider" style="height:400px;">
            <div class="swiper-wrapper" style="height:400px;">
                <div class="swiper-slide" style="background-image:url(assets/img/slide1.jpg);height:400px;position:relative;"></div>
            </div>
    </div>
    <div style="background-color:rgba(255,255,255,0.9);width:82%;padding:10px;margin:0 auto;z-index:21;position:relative;margin-top:-150px;">
        <div class="container" style="width:82%;">
            <div class="row">
                <div class="col-md-12">
                    <form action="overzichtspagina.php" method="post">
                        <!--Filtering from the cars and dates-->
                        <div class="col-md-4" style="width:25%;">
                            <p><strong>Merk:</strong> </p>
                            <div class="radio" style="display:inline;padding-right:34%;"><label><input name="brand" value="BMW" type="radio"><strong>BMW</strong></label></div>
                            <div class="radio" style="display:inline;padding-right:34%;"><label><input name="brand" value="Porsche" type="radio"><strong>Porsche</strong></label></div>
                            <div class="radio" style="display:inline;padding-right:34%;"><label><input name="brand" value="Rolls-Royce" type="radio"><strong>Rolls-Royce</strong></label></div>
                            <div class="radio" style="display:inline;padding-right:34%;"><label><input name="brand" value="Mercedes" type="radio"><strong>Mercedes</strong></label></div>
                        </div>
                        <div class="col-md-4" style="width:25%;">
                            <p><strong>Ophaaldatum: </strong></p><input class="form-control" type="text" id="from" name="from"></div>
                        <div class="col-md-4" style="width:25%;">
                            <p><strong>Inleverdatum: </strong></p><input class="form-control" type="text" id="to" name="to"></div>
                        <input class="btn btn-primary" type="submit" style="/*width:100%;*/margin-top:30px;" value="Zoeken">
                        <!--<div class="col-md-4" style="width:25%;"><a href="overzichtspagina.php?brand=BMW&Mercedes" class="btn btn-primary" type="submit" style="/*width:100%;*/margin-top:40px;">Zoeken</a></div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!--Text from the company-->
                    <h1>Welkom bij Rent a Car</h1>
                    <p>De beste auto's huurt u bij Rent-a-Car. Wij zijn niet alleen goedkoop, maar ook erg betrouwbaar. U bent verzekerd van echte kwaliteit auto's.
                    Kies de voertuigcategorie die het best bij u past, wij garanderen u dat er een auto uit deze categorie op u wacht.<br><br>
                    De auto's kunnen afgehaald worden op: <br>
                    <strong>Autopad 12, 1335 YY te Almere.</strong><br><br>
                    Heeft u meer informatie nodig?<br>
                    Mail of bel ons dan via: <br>
                    <strong>(036) 123 45 67 of rent-a-car@info.nl</strong></p>
                </div>
                <div class="col-md-6">
                    <div class="intro">
                        <h2 class="text-center">Aanbevolen </h2>
                        <p class="text-center">Bekijk hier de meest populaire auto's van Rent-a-Car! </p>
                    </div>
                    <div class="row articles">
                        <!-- GRID VAN ALLE PRODUCTEN! -->
                        <?php
                        $query=mysqli_query($conn,"select * from cars LIMIT 3");
                        while($ft = mysqli_fetch_array($query)) {
                            //dit is voor de link naar de productpagina!
                            $id = $ft['car_id'];
                        ?>
                            <div class="col-md-4 col-sm-6 item"><a href="detailpagina.php?car_id=<?php echo $id ?>"><img class="img-responsive" src="<?php if ($ft['image_name'] == NULL){ echo "http://placehold.it/350x200/333333/FFFFFF";} else { ?>car_images/<?php echo $ft['image_name'];}?>"></a>
                                <h3 class="text-center name"><?php echo $ft['brand']; ?> <?php echo $ft['model']; ?></h3>
                                <p class="text-center description" style="font-size:22px;"><strong>€ <?php echo $ft['day_price']; ?>,-</strong></p>
                                <p class="text-center description" style="font-size:17px;margin-top:-10px;"><em>Per dag</em></p>
                                <a href="huren.php?car_id=<?php echo $id ?>"><button class="btn btn-primary" type="submit" style="width:95%;margin:5px;">Reserveer nu!</button></a>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // includes the footer into the page
        include 'include/footer.php';
    ?>
    <div class="article-list"></div>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>-->
    <!--<script src="assets/js/Simple-Slider.js"></script>-->
</body>

</html>