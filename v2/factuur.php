<?php
//include database connection
require_once 'include/connect.php';
//include session.php for login session!
include 'include/session.php';

//ophalen productgegevens!
if(isset($_GET['invoice_number'])) {
    $invoice_number = $_GET['invoice_number'];
}else{
    header('Location: index.php'); //word weer doorgestruurd na index.php als er geen product is geselecteerd
}

$userID = $sessData['userID'];
//Haalt de gegevens van de factuur op uit de Database!
$query=mysqli_query
            ($conn,"SELECT *
            FROM invoice
            INNER JOIN reservations ON invoice.invoice_number = reservations.invoice_number
            INNER JOIN cars ON reservations.car_id = cars.car_id
            INNER JOIN users ON invoice.user_id = users.user_id
            WHERE invoice.invoice_number = $invoice_number
            ");
while($ft=mysqli_fetch_array($query)) {
    
    
//rekent het aantal dagen uit van de auto.    
$now = strtotime($ft['end_date']); // or your date as well
$your_date = strtotime($ft['begin_date']);
$datediff = $now - $your_date;

//aantal dagen
$totaldays = round($datediff / (60 * 60 * 24));
//dagprijs
$dayprice = $ft['day_price'];
//aantal dagen X dagprijs
$totalprice = $totaldays * $dayprice;
//BTW percentage
$percentage = 21;
$btw = ($percentage / 100) * $totalprice;


?>
<!DOCTYPE html>
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
    
    <!--Printing the right part-->
    <style type="text/css">
        @media print {
          body * {
            visibility: hidden;
          }
          #section-to-print, #section-to-print * {
            visibility: visible;
          }
          #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
          }
        }
    </style>
</head>

<body>
    <?php
    // includes the navigation bar into the page
        include 'include/navbar.php';
    ?>
    <div class="container">
        <div id="section-to-print">
        <h1>Factuur</h1><br>
        
        <p>Rent-a-Car </p>
        <p>Autopad 12</p>
        <p>1335 YY ALMERE</p>
        <p>Telefoon (036) 123 45 67</p><br>
        
        <p>Datum en tijd: <?php echo $ft['invoice_date'];?></p>
        <p>Factuurnummer: <?php echo $ft['invoice_number'];?></p><br>
        
        <p><?php echo $ft['first_name'];?> <?php echo $ft['last_name'];?></p>
        <p><?php echo $ft['street'];?></p>
        <p><?php echo $ft['zipcode'];?> <?php echo $ft['place'];?></p><br>
        <h4>Reserveringen </h4>
        <div class="table-responsive">
            <!--Invoice for the costumer-->
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:100px;">Kenteken </th>
                        <th style="width:100px;">Merk </th>
                        <th style="width:100px;">Type </th>
                        <th style="width:100px;">Gereserveerde periode</th>
                        <th style="width:100px;">Prijs per dag</th>
                        <th style="width:100px;">Totaal </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $ft['licence_plate'];?></td>
                        <td><?php echo $ft['brand'];?></td>
                        <td><?php echo $ft['model'];?></td>
                        <td><?php echo $ft['begin_date'];?> t/m <?php echo $ft['end_date'];?></td>
                        <td><?php echo $ft['day_price'];?>,-</td>
                        <td>€<?php echo $totalprice;?>,-</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>BTW percentage:</td>
                        <td>21%</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>BTW tarief:</td>
                        <td>€<?php echo $btw; ?></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>Totaal te betalen*:</td>
                        <td>€<?php echo $totalprice + $btw; ?></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
        <p>* Betalingen dienen plaats te vinden veertien dagen voor de aanvang van de gereserveerde periode op rekeningnummer 3210808 te name van Rent-a-Car te Almere. Indien er gereserveerd is binnen veertien dagen voor de aanvang van de gereserveerde periode,
            dient de betaling direct plaats te vinden. </p><br><br>
        </div>
        <button class="btn btn-primary" OnClick="window.print()" type="button">Uitprinten</button>
        
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