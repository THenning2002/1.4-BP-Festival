<?php
require("database.php")
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="Tstyle.css"/>
    <title>Nieuws</title>
    <style>
        body{
            background-image: url("Space2.png");
        }
    </style>
    </head>

        <body>
        <div class="topnav">
        <a href="home.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="lineup.php">Line Up</a>
        <a class="active" href="nieuws.php">Nieuws</a>
        <a href="tickets.php">Tickets</a>
        <a href="login.php">Uitloggen</a>
        </div>

        <h1> Nieuws </h1>

        <?php
        $query = "SELECT * FROM nieuwsitems";
        $stm = $pdo->prepare($query);
        if($stm->execute()){
            $nieuwsitems = $stm->fetchALL(PDO::FETCH_OBJ);
            foreach ($nieuwsitems as $nieuws) {
                echo "<h1>$nieuws->koppje</h1> $nieuws->txt";
            }
        }
        
        
        ?>


    </body>
    </html>