<?php
require("database.php");
$query = $pdo->query("SELECT * FROM `ticket`");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ticket</title>
        <link rel="stylesheet" href="Tstyle.css"/>
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

            <h1>Tickets</h1>

            <!-- Tabel aanmaken in HTML -->
            <table id="ticket"> 
                <tr>
                    <th>Nummer</th>
                    <th>Ticket</th> 


                </tr>

            <!-- While loop die door alle opgehaalde rijen van de tabel taak gaat -->
            <?php while ($row = $query->fetch()) { ?>

            <!-- Alle data van de opgehaalde rij in table row stoppen -->

            <?php echo '<tr>' ?>
                <td><?php echo $row['t_id']; ?></td>
                <td><?php echo $row['ticket']; ?></td>

            
            <?php echo '</tr>' ?>

            <?php } ?>
            </table>

            <div class="toevoegen">
            <form method = "POST">
            <h1> Kopen </h1>
            <label for="t_id"> Kies Uw Ticket:</label>
            <select name="cmbticket">
            <?php
            $query = "SELECT * FROM ticket";
            $stm = $pdo->prepare($query);
            if($stm->execute()){
                $result=$stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $row){
                    echo"<option value='".$row->t_id."'> $row->ticket </option>";
                }
            }
           ?>
             </select>
            <br/> 

            <label for="u_id"> Wie bent u?:</label>
            <select name="cmbuser">
            <?php
            $query = "SELECT * FROM login";
            $stm = $pdo->prepare($query);
            if($stm->execute()){
                $result=$stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $row){
                    echo"<option value='".$row->u_id."'> $row->username </option>";
                }
            }
           ?>
            </select>
            <br/> 

            <label for="aantal"> Hoeveel tickets:</label>
             <input type="text" name="aantal" id="aantal" placeholder="Hoeveel tickets">
             <input type="submit" name="btnKopen" value="Kopen" />
        </form>

        <?php
            if (isset($_POST["btnKopen"])){
                $t_id = $_POST["cmbticket"];
                $u_id = $_POST["cmbuser"];
                $aantal = $_POST["aantal"];
        
                $query = "INSERT INTO `order` (t_id, u_id, aantal ) VALUES ('$t_id', '$u_id', '$aantal')";
                $stm = $pdo->prepare($query);
                if($stm->execute())
                {
                    echo"";
                }
                
                else { echo "";
                }
            }
        ?>

        <a href="overzicht.php">Overzicht</a>

        </body>
</html>