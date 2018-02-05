<?php
//include database connection
require_once 'include/connect.php';
//include session.php for login session!
include 'include/session.php';
if(!empty($sessData['userLoggedIn']) && !empty($sessData['staff'] == '1')){
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
</head>

<body>
    <script src="include/upload.js"></script>
    <?php
        // includes the navigation bar into the page
        include 'include/navbar.php';
    ?>
    
        <div class="container">
            <!--Form to add a car to your shop-->
            <form action="include/addProductAction.php" method="post">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="brand">Merk auto</label>
                            <select name="brand" class="form-control" id="select">
                                <option value="BMW">BMW</option>
                                <option value="Porsche">Porsche</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Rolls-Royce">Rolls-Royce</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="model">Welk model?</label>
                            <input type="name" class="form-control" name="model" required="true" placeholder="Benz A klasse">
                        </div>
                    </div>
                </div>
                
                <div class="row my-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="description">Beschrijving?</label>
                            <textarea type="text" class="form-control" name="description" required="true" rows="4" placeholder="Beschrijving van de auto..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="licence_plate">Kenteken</label>
                            <input type="text" class="form-control" name="licence_plate" required="true" placeholder="Kentekennummer"></input>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="car_type">Type auto</label>
                            <input type="text" class="form-control" name="car_type" required="true" placeholder="Sportwagen">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group col-3">
                            <label for="day_price">Prijs per dag</label>
                            <input type="number" class="form-control" name="day_price" required="true" placeholder="120">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="acceleration">Versnelling</label>
                            <select name="acceleration" class="form-control">
                                <option value="Automaat">Automaat</option>
                                <option value="Handmatig">Handmatig</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="image_name">Afbeelding</label>
                            <input type="file" class="form-control" maxlength="12" name="image_name" id="post" required="true" placeholder="image.png">
                            <small id="emailHelp" class="form-text text-muted">Afbeelding mag niet groter zijn dan 1MB! (Aanbevolen formaat 350x200)</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" action="test()" name="go">Product toevoegen</button>
            </form>
        </div>
        <?php
        // includes the footer into the page
            include 'include/footer.php';
        ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
<?php
}else{
    //If else then staff, it redirects you to the home page
    header("Location: index.php");
}
?>