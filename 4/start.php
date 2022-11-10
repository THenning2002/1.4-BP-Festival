<?php
require("database.php");
$query = $pdo->query("SELECT * FROM `festival`");

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css"/>
    <title>Vakantie</title>
        <body>
        <div class="topnav">
        <a class="active" href="start.php">Home</a>
        <a href="contact.php">Contact</a>
        </div>

        <div class="roster">
<!-- Tabel aanmaken in HTML -->
<table id="Festival"> 
    <tr>
        <th>Festival</th>
        <th>Genre</th> 
        <th>Datum</th>

    </tr>

    <!-- While loop die door alle opgehaalde rijen van de tabel taak gaat -->
    <?php while ($row = $query->fetch()) { ?>

    <!-- Alle data van de opgehaalde rij in table row stoppen -->
    
    <?php echo '<tr>' ?>
        <td><?php echo $row['fnaam']; ?></td>
        <td><?php echo $row['genre']; ?></td>
        <td><?php echo $row['datum']; ?></td>

    <?php echo '</tr>' ?>

    <?php } ?>
</table>
    </div>

        <a href="login.php">OUTERSPACE</a>
        </body>
    </head>
</html>