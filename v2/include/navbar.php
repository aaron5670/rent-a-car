<div style="background-color:rgba(59,134,166,0.79);width:100%;height:20px;">
</div>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header"><a href="index.php" class="navbar-brand navbar-link">Rent a Car</a>
            <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-left">
                <li role="presentation"><a href="overzichtspagina.php">Overzichtspagina</a></li>
                <li role="presentation"><a href="contact.php">Contact</a></li>
            </ul>
            <?php
            if(isset($sessData['userLoggedIn'])) {
                echo '
                        <a href="account.php"><button class="btn btn-primary navbar-btn navbar-right" type="button"><strong>Mijn account</strong></button></a>
                        <ul class="nav navbar-nav navbar-right">
                            <li role="presentation"><a style="margin-right:15px;" href="include/userAccount.php?logoutSubmit=1">Uitloggen</a></li>
                        </ul>
                    ';
            }else{
            ?>
                <a href="registreren.php"><button class="btn btn-primary navbar-btn navbar-right" type="button">Registreren</button></a>
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a style="margin-right:15px;" href="inloggen.php">Aanmelden</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>