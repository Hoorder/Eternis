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

                <a href="home.php"><li class="navLiTop active">Home</li></a>
                <a href="add.php"><li class="navLiTop">Dodaj</li></a>
                <a href="statistics.php"><li class="navLiTop">Statystyki</li></a>
                <a href="search.php"><li class="navLiTop">Szukaj</li></a>

            </ul>
        </div>
    </div>

    <div class="container">
        <p class="welcome">Witaj <?php echo $_SESSION['Imie']; ?>.</p>

        <a href="#">
            <div class="optionMoney">
                <p class="statystyki statyMoney">Środki na koncie: <br>
                1 400,00 PLN</p>
            </div>
        </a> <br>

        <a href="add.php">
            <div class="option">
                <p class="statystyki staty">Pogrzeby w tym roku:
<br>
<!-- STATYSTYKI Z OBECNEGO MIESIĄCA -->
<?php
    $question = mysqli_query($connect,"SELECT COUNT(*) AS `thisYear` FROM miejscowosc WHERE YEAR(`kiedy`) = YEAR(CURRENT_DATE())");
    while($row = mysqli_fetch_array($question)){
        echo "<span class='homeStats'>".$row['thisYear']," szt.","</span>";
    }
?>
                </p>

            </div>
        </a>
        <a href="statistics.php">
            <div class="option">
                <p class="statystyki staty">Pogrzeby w tym miesiącu:
<br>
<!-- STATYSTYKI Z MIESIĄCA   -->
<?php
    $question = mysqli_query($connect,"SELECT COUNT(*) AS `miesiac` FROM miejscowosc WHERE MONTH(`kiedy`) = MONTH(CURRENT_DATE()) AND YEAR(`kiedy`) = YEAR(CURRENT_DATE())");
    while($row = mysqli_fetch_array($question)){
        echo "<span class='homeStats'>".$row['miesiac']," szt.","</span>";
    }
?>                
                </p>

            </div>
        </a>
        <a href="search.php">
            <div class="option">
                <p class="statystyki staty">Pogrzeby <br> dzisiaj:
<br>
<!-- STATYSTYKI Z DZISIAJ -->
<?php
    $question = mysqli_query($connect,"SELECT COUNT(*) AS `today` FROM miejscowosc WHERE DAY(`kiedy`) = DAY(CURDATE()) AND YEAR(`kiedy`) = YEAR(CURDATE()) AND MONTH(`kiedy`) = MONTH(CURDATE())");
    while($row = mysqli_fetch_array($question)){
        echo "<span class='homeStats'>".$row['today']," szt.","</span>";
    }
?>              
                </p>
            </div>
        </a>
        <a href="#">
            <div class="option">
                <p class="statystyki staty">Pogrzeby w ubiegłym roku:
<br>
<!-- STATYSTYKI ZESZŁ ROK -->
<?php
    $question = mysqli_query($connect,"SELECT COUNT(*) AS `lastYear` FROM miejscowosc WHERE YEAR(`kiedy`) = YEAR(CURRENT_DATE())-1");
    while($row = mysqli_fetch_array($question)){
        echo "<span class='homeStats'>".$row['lastYear']," szt.","</span>";
    }
?> 
                </p>
            </div>
        </a>
<br>
        <a href="add.php">
            <div class="optionWhite">
                <p class="statystyki">Dodaj</p>
                <div class="logoOption material-icons">
                    add_box
                </div>
            </div>
        </a>
        <a href="statistics.php">
            <div class="optionWhite">
                <p class="statystyki">Statystyki</p>
                <div class="logoOption material-icons">
                    analytics
                </div>
            </div>
        </a>
        <a href="search.php">
            <div class="optionWhite">
                <p class="statystyki">Szukaj</p>
                <div class="logoOption material-icons">
                    search
                </div>
            </div>
        </a>
        <a href="logout.php">
            <div class="optionWhite">
                <p class="statystyki">Wyloguj</p>
                <div class="logoOption material-icons">
                    login
                </div>
            </div>
        </a>
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