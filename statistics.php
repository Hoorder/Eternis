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
                <a href="add.php"><li class="navLiTop">Dodaj</li></a>
                <a href="statistics.php"><li class="navLiTop active">Statystyki</li></a>
                <a href="search.php"><li class="navLiTop">Szukaj</li></a>

            </ul>
        </div>
    </div>

    <div class="container">
        
        <p class="welcome">Wybierz rok:</p>

        <form action="" method="post">
            <select name="rok" class="rok">
                <option value="2024">2024</option>
            </select>
            <button type="submit" class="rok">Wybierz</button>
        </form>
        <br>
        <div class="contLewy">
            <div class="optionName">Słupkowo</div>
            <table>
                <tr>
                    <th>Miejscowość</th>
                    <th>Popularność</th>
                </tr>
            <?php podsumowanie() ?>
            </table>
        </div>

        <div class="contPrawy">
            <div class="optionName">Liczbowo</div>
            <table>
                <tr>
                    <th>Miejscowość</th>
                    <th>Ilość</th>
                </tr>
            <?php podsumowanieCzyste() ?>
            </table>
        </div>

    </div>

    <script src="script/app.js"></script>

</body>
<script src="script/app.js"></script>
</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>