<?php

// WSTAWIANIE DANYCH
if(isset($_POST['submit'])){
    mysqli_query($connect, "INSERT INTO `miejscowosc` (`id`, `miejscowosc`, `kiedy`) VALUES (NULL, '$_POST[miejsce]', '$_POST[data]')");
}

// WYŚWIETLANIE DANYCH Z MOŻLIWOŚCIĄ WYBORU ILOŚCI REKORDÓW
function wyswietlaniePogrzebow() {

    if(isset($_POST['records'])){
        $question = mysqli_query($GLOBALS['connect'], "SELECT `id`, `miejscowosc`, `kiedy` FROM `miejscowosc` WHERE `id` BETWEEN 1 AND '$_POST[records]' ORDER BY `miejscowosc`.`kiedy` ASC");
        
        while($row = mysqli_fetch_array($question)) {
            echo "<tr><td>" .$row['id'], "</td><td>" .$row['miejscowosc'],"</td><td>" .$row['kiedy']. "</td> <td> <button>Usuń</button> <button>Edytuj</button> </td></tr>";
        }

    } else {

        $question = mysqli_query($GLOBALS['connect'], "SELECT `id`, `miejscowosc`, `kiedy` FROM `miejscowosc` WHERE `id` BETWEEN 1 AND 25 ORDER BY `miejscowosc`.`kiedy` ASC");
    
        while($row = mysqli_fetch_array($question)){
            echo "<tr><td>" .$row['id'], "</td><td>" .$row['miejscowosc'],"</td><td>" .$row['kiedy']. "</td> <td> <button>Usuń</button></td></tr>";
        }
    }
}

// INFORMACJE Z 30 DNI WSTECZ
function wyswietlanie30Dni() {
    $question = mysqli_query($GLOBALS['connect'], "SELECT `id`, `miejscowosc`, `kiedy` FROM `miejscowosc` WHERE `kiedy` BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) AND DATE_SUB(CURRENT_DATE(), INTERVAL 00 DAY) ORDER BY `miejscowosc`.`id` DESC");

    while($row = mysqli_fetch_array($question)){
        echo "<tr><td>" .$row['id'], "</td><td>" .$row['miejscowosc'],"</td><td>" .$row['kiedy']. "</td> <td> <button>Usuń</button></td></tr>";
    }
}

// WYŚWIETLA DANY PRZEDZIAŁ CZASU
function wyswietlaniePrzedzialu() {
    
    if(isset($_POST['pierwszaData'])){
        
        $question = mysqli_query($GLOBALS['connect'], "SELECT `miejscowosc`, `kiedy` FROM `miejscowosc` WHERE `kiedy` BETWEEN '$_POST[pierwszaData]' AND '$_POST[drugaData]'");

        while($row = mysqli_fetch_array($question)) {
            echo "<tr><td>".$row['miejscowosc'], "</td><td> " .$row['kiedy'], "</td></tr>";
        }

    }

}

// LICZBA POGRZEBÓW W DANEJ MIEJSCOWOŚCI (L.wierszy w tabeli)
function pogrzebyMiejscowosc() {

    if(isset($_POST['miejscowosc'])){
    
        $miejscowosc = $_POST['miejscowosc'];

        $question = mysqli_query($GLOBALS['connect'], "SELECT `miejscowosc`, `kiedy` FROM `miejscowosc` WHERE miejscowosc = '$miejscowosc' AND YEAR(`kiedy`) = '$_POST[rok]' ORDER BY `miejscowosc`.`kiedy` DESC");
        
        while($row = mysqli_fetch_array($question)){
            echo "<tr><td>".$row['miejscowosc'], "</td><td> " .$row['kiedy'], "</td></tr>";
        }
    }
}

// WYŚWIETLANIE ILOŚCI OBSŁUG W DANEJ MIEJSCOWOŚCI WYKRESOWO
function podsumowanie() {
    
    if(isset($_POST['rok'])){

        $question = mysqli_query($GLOBALS['connect'], "SELECT miejscowosc,YEAR(`kiedy`) AS Rok, COUNT(miejscowosc) AS `Liczba imprez` FROM miejscowosc WHERE YEAR(`kiedy`) = '$_POST[rok]' GROUP BY miejscowosc ORDER BY `Liczba imprez` DESC");

        while($row = mysqli_fetch_array($question)){
            echo "<tr><td><p>" .$row['miejscowosc'],"</p></td> <td> <p class='statistics'>" .$row['Liczba imprez'], "</p></td></tr>";
        }
    } else {
        
        $question = mysqli_query($GLOBALS['connect'], "SELECT miejscowosc,YEAR(`kiedy`) AS Rok, COUNT(miejscowosc) AS `Liczba imprez` FROM miejscowosc WHERE YEAR(`kiedy`) = YEAR(CURDATE()) GROUP BY miejscowosc ORDER BY `Liczba imprez` DESC");

        while($row = mysqli_fetch_array($question)){
            echo "<tr><td><p>" .$row['miejscowosc'],"</p></td> <td> <p class='statistics'>" .$row['Liczba imprez'], "</p></td></tr>";
        }
    }
}

// WYŚWIETLANIE ILOŚCI OBSŁUG W DANEJ MIEJSCOWOŚCI LICZBOWO
function podsumowanieCzyste() {

    if(isset($_POST['rok'])){

        $question = mysqli_query($GLOBALS['connect'], "SELECT miejscowosc,YEAR(`kiedy`) AS Rok, COUNT(miejscowosc) AS `Liczba imprez` FROM miejscowosc WHERE YEAR(`kiedy`) = '$_POST[rok]' GROUP BY miejscowosc ORDER BY `Liczba imprez` DESC");

        while($row = mysqli_fetch_array($question)){
            echo "<tr><td><p>" .$row['miejscowosc'],"</p></td> <td> <p class=''>" .$row['Liczba imprez'], "</p></td></tr>";
        }
    } else {

        $question = mysqli_query($GLOBALS['connect'], "SELECT miejscowosc,YEAR(`kiedy`) AS Rok, COUNT(miejscowosc) AS `Liczba imprez` FROM miejscowosc WHERE YEAR(`kiedy`) = YEAR(CURDATE()) GROUP BY miejscowosc ORDER BY `Liczba imprez` DESC");

        while($row = mysqli_fetch_array($question)){
            echo "<tr><td><p>" .$row['miejscowosc'],"</p></td> <td> <p class=''>" .$row['Liczba imprez'], "</p></td></tr>";
        }
    }
}
?>