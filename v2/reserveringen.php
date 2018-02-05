<?php
//include database connection
require_once 'include/connect.php';
//include session.php for login session!
include 'include/session.php';
if(!empty($sessData['userLoggedIn']) && !empty($sessData['staff'] == '1')){
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
    
    <style type="text/css">
        @media print {
          body * {
            visibility: hidden;
          }
          #section-to-print, #section-to-print * {
            visibility: visible;
          }
          #section-to-hide, #section-to-hide * {
            visibility: hidden;
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
        <h1>Beheerderspagina - Lijst van reserveringen</h1>
    </div>
    <!--The whole list of reservations-->
    <div class="container">
        <div id="section-to-print">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:100px;">Naam klant</th>
                            <th style="width:100px;">Ophaaldatum </th>
                            <th style="width:100px;">Tijd </th>
                            <th style="width:100px;">Kenteken </th>
                            <th style="width:100px;">Merk </th>
                            <th style="width:100px;">Type </th>
                            <th style="width:100px;">Inleverdatum </th>
                            <th id="section-to-hide" style="width:100px;">Afgehandeld </th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                        // Takes all users from the tabel Users
                        $sql =  "
                                    SELECT *
                                    FROM invoice
                                    INNER JOIN reservations ON invoice.invoice_number = reservations.invoice_number
                                    INNER JOIN cars ON reservations.car_id = cars.car_id
                                    INNER JOIN users ON invoice.user_id = users.user_id ORDER BY begin_date, time ASC
                                ";
                        $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result))
                        {
                            ?>
                        <tr>
                            <td><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></td>
                            <td><?php echo $row['begin_date'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td><?php echo $row['licence_plate'];?></td>
                            <td><?php echo $row['brand'];?></td>
                            <td><?php echo $row['model'];?></td>
                            <td><?php echo $row['end_date'];?></td>
                            <td id="section-to-hide"><a href="include/deleteinvoice.php?id=<?php echo $row['invoice_number']; ?>"><button class="btn btn-primary" type="button">Afhandelen</button></a></td>
                        </tr>
                                    <?php
                                }
                            mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Printing the list of reservations-->
        <button class="btn btn-primary" OnClick="window.print()" type="button">Lijst uitprinten</button>
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
    header("Location: index.php");
}
?>