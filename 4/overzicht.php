<?php
require("database.php");

$query = $pdo->query("SELECT order.o_id as o_id,login.username as username,ticket.ticket as ticket, order.aantal as aantal FROM ticket, `login` , `order` WHERE ticket.t_id = `order`.t_id AND `login`.u_id = `order`.u_id");

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="Tstyle.css"/>
    <title>Overzicht</title>
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
        <a href="nieuws.php">Nieuws</a>
        <a class="active" href="tickets.php">Tickets</a>
        <a href="login.php">Uitloggen</a>
        </div>

        <h1>Overzicht Verkochten tickets</h1>
    
        <!-- Tabel aanmaken in HTML -->
        <table id="line-up"> 
            <tr>
                <th>Order nummer</th>
                <th>Naam</th> 
                <th>Soort</th>
                <th>Aantal</th>

            </tr>

            <!-- While loop die door alle opgehaalde rijen van de tabel taak gaat -->
            <?php while ($row = $query->fetch()) { ?>

            <!-- Alle data van de opgehaalde rij in table row stoppen -->
            
            <?php echo '<tr>' ?>
                <td><?php echo $row['o_id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['ticket']; ?></td>
                <td><?php echo $row['aantal']; ?></td>

            <?php echo '</tr>' ?>

            <?php } ?>
        </table>

        <a href="tickets.php">Tickets</a>

        </body>
</html>