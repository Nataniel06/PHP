<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>¨
    <link rel="stylesheet" href="kul.css">
</head>
<body>
<div class="php" >  
    <?php
        include "connect.php";

        #$id_fra_link = $_GET['bruker_id'];

        $sql = "SELECT * FROM bruker WHERE idbruker='1' ";
        $resultat = $con->query($sql); # henter ut fra DB
        echo "<div class='profil'>";
        $rad = $resultat->fetch_assoc();
            $idbruker = $rad['idbruker'];  # idbil i brun tekst må samsvare med feltnavn i DB
            $brukernavn = $rad['brukernavn'];
            $fornavn = $rad['fornavn'];
            $etternavn = $rad['etternavn'];
            $bio = $rad['bio'];
            $passord = $rad['passord'];
            $epost = $rad['epost'];
            $tlf = $rad['tlf'];
            $skole = $rad['skole'];
            $bosted = $rad['bosted'];
            $fodselsdato = $rad['fodselsdato'];
   

        echo "<h1>$brukernavn</h1> 
            <h3>$fornavn, $etternavn</h3>
            <p> $bio </p>
            <p> $tlf </p>
            <p> $skole </p>
            <p> $bosted </p>
            <p> $fodselsdato </p>
            
            
            ";
        echo "</div>";
    ?>

</div>
</body>
</html>