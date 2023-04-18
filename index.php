<?php
session_start();
include "sjekklogin.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kul.css">
</head>
<body>
    
    <div class="tittel" >
    <img  src="img/nchat.png" alt=""> <br></div>
    <br>

    <div class="frontside" >
    <h3><a href="laggtil.php">Legg til bruker</a>
    <a href="minprofil.php">Min profil</a></br> 
    </br>
    </br>
    </br>
    <?php 
        include "connect.php";
            
        $sql = "SELECT idbruker, brukernavn FROM bruker ";
        $resultat = $con->query($sql); # henter ut fra DB
    
        while($rad = $resultat->fetch_assoc()) { # loop gjennom alle brukere
            $idbruker = $rad['idbruker'];  
            $brukernavn = $rad['brukernavn'];
    
            echo "<a href='profil.php?bruker_id=$idbruker'>$brukernavn</a><br>";

        }
    
    ?>

</body>
</html>