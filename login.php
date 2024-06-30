<?php
session_start();
include('connect.php');

if(isset($_POST['login']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['login']);
    $pass = validate($_POST['password']);

    if(empty($uname)) {
        header("Location: index.php?error=Nazwa użytkownika jest wymagana");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Hasło jest wymagane");
        exit();
    } else {
        $pass = md5($pass);
        
        $sql = "SELECT * FROM uzytkownicy WHERE `Login` = '$uname' AND `Haslo` = '$pass'";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Login'] === $uname && $row['Haslo'] === $pass) {
                $_SESSION['Login'] = $row['Login'];
                $_SESSION['Imie'] = $row['Imie'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: index.php?error=Nieprawidłowaa nazwa użytkownika lub hasło");
                exit(); 
            }
        } else {
            header("Location: index.php?error=Nieprawidłowa nazwa użytkownika lub hasło");
            exit();
        }
    }

} else {
    header("Location: index.php");
    exit();
}

?>