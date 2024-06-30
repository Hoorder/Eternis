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
                <img src="image/logo.png" alt="logo">
            </div></a>

            <button class="hamburger">
                <span class="hamburger__box">
                    <span class="hamburger__inner"></span>
                </span>
            </button>

            <ul class="navUlTop .On">

                <a href="home.php"><li class="navLiTop">Home</li></a>
                <a href="add.php"><li class="navLiTop">Dodaj</li></a>
                <a href="statistics.php"><li class="navLiTop">Statystyki</li></a>
                <a href="search.php"><li class="navLiTop active">Szukaj</li></a>

            </ul>
        </div>
    </div>

    <div class="container">

        <p class="welcome">Szukaj według:</p>

        <div class="contLewy">

            <div class="optionName">Data</div>

            <form action="" method="post">
                <input type="date" name="pierwszaData" class="input" required>
                <input type="date" name="drugaData" class="input" required>
                <button type="submit" class="btn">Szukaj</button>
            </form>

            <table>
                <tr>
                    <th>Miejscowość</th>
                    <th>Data</th>
                </tr>
            <?php wyswietlaniePrzedzialu(); ?>
            </table>
        
        </div>

        <div class="contPrawy">

            <div class="optionName">Miejscowość</div>
        
            <form action="" method="POST">
                <input type="text" name="miejscowosc" class="input" placeholder="Np: Lubenia" required>
                <select name="rok" id="rok" class="input">
                    <option value="2024">2024</option>
                </select>
            <button type="submit" class="btn">Szukaj</button>
            </form>

            <table>
                <tr>
                    <th>Miejscowość</th>
                    <th>Data</th>
                </tr>
            <?php pogrzebyMiejscowosc(); ?>
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