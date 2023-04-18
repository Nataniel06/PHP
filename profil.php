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
<div class="php" >  

    <?php
        include "connect.php";
        session_start();

        $id = $_GET['bruker_id'];
        

        $sql = "SELECT * FROM bruker WHERE idbruker='$id' ";
        $resultat = $con->query($sql); # henter ut fra DB
        echo "<div class='profil'>";
        $rad = $resultat->fetch_assoc();
            $idbruker = $rad['idbruker'];  # idbruker i rød tekst må samsvare med feltnavn i DB
            $brukernavn = $rad['brukernavn'];
            $fornavn = $rad['fornavn'];
            $etternavn = $rad['etternavn'];
            $bio = $rad['bio'];
            $passord = $rad['passord'];
            $epost = $rad['epost'];
            $tlf = $rad['tlf'];
            $skole = $rad['skole_jobb'];
            $bosted = $rad['bosted'];
            $fodselsdato = $rad['fodselsdato'];
            $profilbilde = $rad['profilbilde'];
   

        echo "<h1>$brukernavn</h1> 
            <img class='bilde' src='img/$profilbilde' alt=''>
            <h3>$fornavn, $etternavn</h3>
            <p> $bio </p>
            <p> $tlf </p>
            <p> $skole </p>
            <p> $bosted </p>
            <p> $fodselsdato </p>
            
           
            ";

            
                $sql = "SELECT * FROM media WHERE idbruker='$id' ";
                $resultat = $con->query($sql); # henter ut fra DB
            echo "<div class='eidbilde'>";
                while($rad = $resultat->fetch_assoc()) { # loop gjennom alle brukere
                    $media_navn = $rad['media_navn'];  
                    echo "<img class='bilder'src='img/$media_navn'>";
                }
        
            echo "</div>
            <div class='card'>";
            
                
            $sql = "SELECT * FROM innlegg WHERE idbruker='$id' ";
            $resultat = $con->query($sql);

            if (mysqli_num_rows($resultat) > 0) {

                while($rad = $resultat->fetch_assoc()) { # loop gjennom alle innlegg
                    echo "<div class='card__content'>";
                    $tekst = $rad['tekst']; 
                    $idinnlegg = $rad['idinnlegg']; 
                    
                    echo "<br>";
                    echo $tekst;

                    include "kommentar.php";

                    echo "<form method='POST'>
                                        
                                    <br>
                                        <input type='text' name='tekst_kommentar'><br><br>
                                        <input name='idinnlegg' type='hidden' value='$idinnlegg'>
                                        <input type='submit' name='soobmit_kommentar' value='skriv kommentar'> 
                                    </form>
                                    ";
                    


                }  // end innlegg loop 
            }


                if (isset($_POST["soobmit_kommentar"])) {
                    
                    $tekst = $_POST["tekst_kommentar"]; 
                    $id = $_SESSION["login_id"];
                    $idinnlegg = $_POST["idinnlegg"];
                    
                    $sql = "INSERT INTO innlegg_kommentar (tekst, idbruker, idinnlegg, date) VALUES ('$tekst','$id', '$idinnlegg', now() )";
                    
                    if($con->query($sql)){
                        echo "kommentar ble lagt til";
                    } else {
                        echo "Feilmelding: $con->error";
                    }
                }
                
            
            echo "</div>";
        
    ?>


        

</div>
</body>
</html>