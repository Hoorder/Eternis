<?php session_start();

if (isset($_SESSION['id']) && isset($_SESSION['Login'])) {


?>
<?php include('connect.php');?>
<?php include('operations.php');?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eternis Dashboard</title>
</head>
<body>
    
    <div class="nav">
        <div class="navContainer">
            <a href="home.php"><div class="logo">
                <img src="image/logo.png" alt="">
            </div></a>

            <button class="hamburger">
                <span class="hamburger__box">
                    <span class="hamburger__inner"></span>
                </span>
            </button>

            <ul class="navUlTop .On">

                <a href="home.php"><li class="navLiTop">Home</li></a>
                <a href="add.php"><li class="navLiTop active">Dodaj</li></a>
                <a href="statistics.php"><li class="navLiTop">Statystyki</li></a>
                <a href="search.php"><li class="navLiTop">Szukaj</li></a>

            </ul>
        </div>
    </div>

    <div class="container">

        <div class="contSrodkowy">

            <p class="welcome">Dodaj miejscowość:</p>
            <br>
            <div class="optionName">Ostatnie 30 dni:</div>
            <table>
                <tr>
                    <th>Lp.</th>
                    <th>Miejscowość</th>
                    <th>Data</th>
                    <th>Opcje</th>
                </tr>
            <?php wyswietlanie30Dni(); ?>
            </table>
        </div>

    </div>

</body>
<script src="script/app.js"></script>
</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>