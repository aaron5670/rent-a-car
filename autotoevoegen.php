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
        <form>
            <h1 style="padding:16px;">Auto's toevoegen</h1>
            <p style="margin:15px;">Naam auto:</p><input class="form-control" type="text">
            <p style="margin:15px;">Merk auto:</p><input class="form-control" type="text">
            <p style="margin:15px;">Type auto:</p><input class="form-control" type="text">
            <p style="margin:15px;">Versnelling: </p><input class="form-control" type="text">
            <p style="margin:15px;">Prijs per dag:</p><input class="form-control" type="text">
            <p style="margin:15px;">Kentekennummer: </p><input class="form-control" type="text">
            <p style="margin:15px;">Beschrijving: </p><input class="form-control" type="text">
            <p style="margin:15px;">Afbeelding toevoegen:</p><input class="form-control" type="text"><button class="btn btn-primary" type="submit" style="width:288px;margin:5px;">Toevoegen! </button></form>
        <?php
            include 'include/footer.php';
        ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>