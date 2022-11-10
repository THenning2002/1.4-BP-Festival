<?php
require("database.php");
$query = $pdo->query("SELECT * FROM `line-up`");

?>


<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="Tstyle.css"/>
    <style>
        body{
            background-image: url("Space2.png");
        }
    </style>
    <title>Line-Up</title>
        <body>
        <div class="topnav">
        <a href="home.php">Home</a>
        <a href="contact.php">Contact</a>
        <a class="active" href="lineup.php">Line Up</a>
        <a href="nieuws.php">Nieuws</a>
        <a href="tickets.php">Tickets</a>
        <a href="login.php">Uitloggen</a>
        </div>

        <h1>Line-Up</h1>

<!-- Tabel aanmaken in HTML -->
<table id="line-up"> 
    <tr>
        <th>Nummer</th>
        <th>Naam</th> 
        <th>Genre</th>

    </tr>

    <!-- While loop die door alle opgehaalde rijen van de tabel taak gaat -->
    <?php while ($row = $query->fetch()) { ?>

    <!-- Alle data van de opgehaalde rij in table row stoppen -->
    
    <?php echo '<tr>' ?>
        <td><?php echo $row['a_id']; ?></td>
        <td><a href="<?php echo $row['link']; ?>" ><?php echo $row['naam']; ?></a></td>
        <td><?php echo $row['genre']; ?></td>

    <?php echo '</tr>' ?>

    <?php } ?>
</table>