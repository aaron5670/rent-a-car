<?php
//include database connection
require_once 'include/connect.php';
//include session.php for login session!
include 'include/session.php';
if(isset($sessData['userLoggedIn'])) {
    header("Location:index.php");
}else{
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
    <div class="login-clean">
        <form action="include/userAccount.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <h1>Inloggen </h1>
            <div class="form-group"><input class="form-control" type="email" name="email" id="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" id="password" placeholder="Password"></div>
            <input type="submit" name="loginSubmit" value="Inloggen">
            <span class="text-success align-middle">
                <?php echo !empty($statusMsg)?'<i class="fa fa-close"></i><p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
            </span>
        </form>
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
<?php
}
?>