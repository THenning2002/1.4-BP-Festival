<?php
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
            <div class="Registreren">
                <form method="POST">
                <label for="username"> Gebruikersnaam:</label>
                <input type="text" name="username" id="username" placeholder="Geberuikersnaam"/>
                <br/> 
                <label for="password"> Wachtwoord:</label>
                <input type="password" name="password" id="password" placeholder="Wachtword"/>
                <br/>
                <label for="password2"> Wachtwoord verification:</label>
                <input type="password" name="password2" id="password2" placeholder="wachtword"/>
                <input type="submit" name="btnRegistreren" value="Registreren" />
                <a href="login.php">Login</a>
                </form>
            </div>
            <?php
                if (isset($_POST["btnRegistreren"])){
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $password2 = $_POST["password2"];

                    if($password === $password2) {
                        $passwordHash = password_hash($password, null);
                        
                        echo "";

                        
                    $query = "INSERT INTO login (username, password) VALUES ('$username', '$passwordHash')";
                    $stm = $pdo->prepare($query);
                    if ($stm->execute())
                    {
                        echo"Registreren is gelukt";

                    }
                }

            }
            ?>

        </body>
</html>