<?php
session_start();
require("database.php")
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="Tstyle.css"/>
    <title>Vakantie</title>
    <style>
        body{
            background-image: url("Space3.png");
        }
    </style>
    </head>
        <body>
            <div class="login">
            <form method="POST">
            <label for="username"> Gebruikersnaam:</label>
            <input type="text" name="username" id="username" placeholder="Geberuikersnaam"/>
            <br/> 
            <label for="password"> Wachtwoord:</label>
            <input type="password" name="password" id="password" placeholder="Wachtword"/>
            <br/> 
            <input type="submit" name="btnLogin" value="Login" />
            <a href="Registreren.php">Registreren</a>

            
            <!-- // doorverwijzing als alles goed is -->
            <?php
                if(isset($_POST['btnLogin']))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM `login` WHERE `username`='$username'";

                    $stm = $pdo->prepare($query);
                    if($stm->execute()){
                        $username = $stm->fetch(PDO::FETCH_OBJ);
                        if(password_verify($password, $username->password)) {
                            $_SESSION['username'] = $username;
                            Header("Location: home.php");
                        }else{
                            echo "fout";
                        }
                    }
                }
            ?>

               </div>
            </form>

        
        
        </body>
</html>