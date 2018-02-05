<?php
//include database connection
require_once 'include/connect.php';
//include session.php for login session!
include 'include/session.php';

if(!isset($sessData['userLoggedIn'])) {
    header("Location:index.php");
}else{
        $userID = $sessData['userID'];
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
</head>

<body>
    <?php
    // includes the navigation bar into the page
        include 'include/navbar.php';
        //Mederwerker paneel
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['staff'] == '1')){
    ?>


    
    <div class="container">
        <h1>Beheerderspagina </h1><a href="autotoevoegen.php"><button class="btn btn-primary" type="submit" style="width:194px;margin:60px;">Auto toevoegen</button></a>
        <a href="lijstauto.php"><button class="btn btn-primary" type="submit" style="width:194px;margin:60px;">Lijst van auto's</button></a>
        <a href="reserveringen.php"><button class="btn btn-primary" type="submit" style="width:194px;margin:60px;">Reserveringen </button></a></div>
        
    <?php
        //Klant paneel
        }elseif(!empty($sessData['userLoggedIn']) && !empty($sessData['staff'] == '0')){
    ?>
        <div class="container">
            <!--List of hired cars for the costumer-->
            <h1>Mijn gehuurde auto's</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Factuurnummer</th>
                            <th style="width:350px;">Auto</th>
                            <th style="width:350px;">Kenteken</th>
                            <th style="width:350px;">Ophaaldatum en tijd</th>
                            <th style="width:350px;">Inleverdatum</th>
                            <th style="width:350px;">Factuur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query=mysqli_query
                            ($conn,"SELECT * FROM invoice
                            INNER JOIN reservations ON invoice.invoice_number = reservations.invoice_number
                            INNER JOIN cars ON reservations.car_id = cars.car_id
                            INNER JOIN users ON invoice.user_id = users.user_id
                            WHERE users.user_id = $userID;
                            ");
                        while($ft = mysqli_fetch_array($query)) {
                        ?>
                        <tr style="width:350px;">
                            <td><?php echo $ft['invoice_number']; ?></td>
                            <td><?php echo $ft['brand']; ?> <?php echo $ft['model']; ?></td>
                            <td><?php echo $ft['licence_plate']; ?></td>
                            <td><?php echo $ft['begin_date']; ?> om <?php echo $ft['time']; ?></td>
                            <td><?php echo $ft['end_date']; ?></td>
                            <td><a href="factuur.php?invoice_number=<?php echo $ft['invoice_number']; ?>"><button class="btn btn-primary" type="button">Factuur weergeven</button></a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!--Standard information for the costumer-->
            <p>De auto's kunnen afgehaald worden op: <br>
            <strong>Autopad 12, 1335 YY te Almere.</strong><br><br>

            Heeft u meer informatie nodig?<br>
            Mail of bel ons dan via: <br>
            <strong>(036) 123 45 67 of rent-a-car@info.nl</strong></p>
        </div>
            
        <?php
        }
    ?>
            </tbody>
        </table>
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
    }
?>