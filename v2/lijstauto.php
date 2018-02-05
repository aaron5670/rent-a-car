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
</head>

<body>
    <?php
    // includes the navigation bar into the page
        include 'include/navbar.php';
    ?>
    <div class="container">
        <h1>Beheerderspagina - Lijst van auto's</h1>

                <table id="myTable" class="table table-striped">
                    <tr class="header">
                        <th><strong>Auto</strong></th>
                        <th><strong>Kenteken</strong></th>
                        <th><strong>Beschrijving</strong></th>
                        <th style="width:80px";><strong>Prijs</strong></th>
                        <th><strong>Categorie</strong></th>
                        <th><strong>Versnelling</strong></th>
                        <th></th>
                    </tr>

                    <?php
                    //haalt alle gebruikers op uit de tabel Users
                    $sql = "SELECT * FROM cars";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                        <tr class="<?php echo $row['car_id'] ?>">
                            <td><?php echo $row['brand']; ?> <?php echo $row['model']; ?></td>
                            <td><?php echo $row['licence_plate']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><p>€ <?php echo $row['day_price']; ?>,-</p></td>
                            <td><?php echo $row['car_type']; ?></td>
                            <td><?php echo $row['acceleration']; ?></td>

                            <td><a href="include/delete.php?id=<?php echo $row['car_id']; ?>">X</a></td>
                        </tr>
                        <?php
                    }
                    mysqli_close($conn);
                    ?>

                </table>

                <script>
                    function myFunction() {
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
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