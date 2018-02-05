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
</head>

<body>
  <?php
   include 'include/navbar.php';
  ?>
    <div class="simple-slider" style="height:400px;">
        <div class="swiper-container" style="height:400px;">
            <div class="swiper-wrapper" style="height:400px;">
                <div class="swiper-slide" style="background-image:url(assets/img/slide1.jpg);height:400px;position:relative;"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/slide2.jpg);height:400px;position:relative;"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/slide3.jpg);height:400px;position:relative;"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div style="background-color:rgba(255,255,255,0.9);width:82%;padding:10px;margin:0 auto;z-index:21;position:relative;margin-top:-150px;">
        <div class="container" style="width:82%;">
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="col-md-4" style="width:25%;">
                            <p><strong>Merk:</strong> </p>
                            <div class="checkbox" style="display:inline;padding-right:34%;"><label><input type="checkbox"><strong>BMW</strong></label></div>
                            <div class="checkbox" style="display:inline;padding-right:34%;"><label><input type="checkbox"><strong>Porsche</strong></label></div>
                            <div class="checkbox" style="display:inline;padding-right:34%;"><label><input type="checkbox"><strong>Rolls-Royce</strong></label></div>
                            <div class="checkbox" style="display:inline;padding-right:34%;"><label><input type="checkbox"><strong>Mercedes</strong></label></div>
                        </div>
                        <div class="col-md-4" style="width:25%;">
                            <p><strong>Ophaaldatum: </strong></p><input class="form-control" type="date"></div>
                        <div class="col-md-4" style="width:25%;">
                            <p><strong>Inleverdatum: </strong></p><input class="form-control" type="date"></div>
                        <div class="col-md-4" style="width:25%;"><button class="btn btn-primary" type="submit" style="/*width:100%;*/margin-top:40px;">Zoeken </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Welkom bij Rent a Car</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                </div>
                <div class="col-md-6">
                    <div class="intro">
                        <h2 class="text-center">Aanbevolen </h2>
                        <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
                    </div>
                    <div class="row articles">
                        <div class="col-md-4 col-sm-6 item"><a href="detailpagina.php"><img class="img-responsive" src="assets/img/desk.jpg"></a>
                            <h3 class="text-center name">BMW 730</h3>
                            <p class="text-center description" style="font-size:22px;"><strong>€ 99</strong></p>
                            <p class="text-center description" style="font-size:17px;margin-top:-10px;"><em>Per dag</em></p><a href="detailpagina.php" class="action"><button class="btn btn-primary" type="submit" style="width:95%;margin:5px;">Reserveer nu!</button></a></div>
                        <div class="col-md-4 col-sm-6 item"><a href="detailpagina.php"><img class="img-responsive" src="assets/img/building.jpg"></a>
                            <h3 class="text-center name">Article Title</h3>
                            <p class="text-center description" style="font-size:22px;"><strong>€ 99</strong></p>
                            <p class="text-center description" style="font-size:17px;margin-top:-10px;"><em>Per dag</em></p><a href="detailpagina.php" class="action"><button class="btn btn-primary" type="submit" style="width:95%;margin:5px;">Reserveer nu!</button></a></div>
                        <div class="col-md-4 col-sm-6 item"><a href="detailpagina.php"><img class="img-responsive" src="assets/img/loft.jpg"></a>
                            <h3 class="text-center name">Article Title</h3>
                            <p class="text-center description" style="font-size:22px;"><strong>€ 99</strong></p>
                            <p class="text-center description" style="font-size:17px;margin-top:-10px;"><em>Per dag</em></p><a href="detailpagina.php" class="action"><button class="btn btn-primary" type="submit" style="width:95%;margin:5px;">Reserveer nu!</button></a></div>
                    </div>
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