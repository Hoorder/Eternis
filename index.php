<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eternis Dashboard</title>
</head>
<body>

    <div class="container">
        <img src="image/Winiarski_Hades.png" alt="Winiarski-Hades">
        <?php if(isset($_GET['error'])) { ?>
            <p class="errorLog"><?php echo $_GET['error'] ?></p>
        <?php } ?>
        <div class="loginpanel">

        <form action="login.php" method="post">
            <label for="login">Login:</label>
            <br>
            <input type="text" name="login" class="login" id="login" require>
            <br>
            <label for="login">Hasło:</label>
            <br>
            <input type="password" name="password" class="haslo" require>
            <br>
            <button type="submit" class="zaloguj">Zaloguj</button>
        </form>
        </div>
    </div>

</body>
</html>
