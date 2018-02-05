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
    <div class="login-clean" style="background-color:rgb(255,255,255);padding-bottom:45px;">
        <form action="<?php if(isset($_GET['redr'])){echo "userAccount.php?redr=checkout";}else{ echo "include/userAccount.php";} ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Voornaam</label>
                <input type="text" name="first_name" class="form-control" placeholder="Voornaam">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Achternaam</label>
                <input type="text" name="last_name" class="form-control" placeholder="Achternaam">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Straatnaam + Huisnummer</label>
                <input type="text" name="street" class="form-control" placeholder="Straatnaam 123">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Plaats</label>
                <input type="text" name="place" class="form-control" placeholder="Plaatsnaam">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Postcode</label>
                <input type="text" maxlength="7" name="zipcode" class="form-control" placeholder="Postcode">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Provincie</label>
                <input type="text" name="province" class="form-control" placeholder="Provincie">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Land</label>
                <input type="text" name="country" class="form-control" placeholder="Land">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Telefoonnummer</label>
                <input type="text" name="phone" class="form-control" placeholder="Telefoonnummer">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Wachtwoord</label>
                <input type="password" name="password" class="form-control" placeholder="Wachtwoord">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Herhaal wachtwoord</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Herhaal wachtwoord">
            </div>
            <button type="submit" name="signupSubmit" class="btn btn-primary">Aanmelden</button>
            <span class="text-success align-middle">
                <?php echo !empty($statusMsg)?'<i class="fa fa-close"></i><p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
            </span>
        </form>
    </div>
    <div style="width:640px;margin:0 auto;"></div>
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