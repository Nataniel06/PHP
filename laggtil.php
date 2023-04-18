<form method="POST">
    
  
    skriv inn brukernavn
    <br><input type="text" name="brukernavn"><br><br>

    


    skriv inn fornavn
    <br><input type="text" name="fornavn"><br>
    
    


    skriv inn etternavn
    <br><input type="text" name="etternavn"><br>
    


    skriv inn passord
    <br><input type="text" name="passord"><br>
    
    
    skriv inn epost
    <br><input type="text" name="epost"><br>
    
    skriv inn tlf
    <br><input type="text" name="tlf"><br>

    skriv inn skole/jobb
    <br><input type="text" name="skole_jobb"><br>

    skriv inn bosted
    <br><input type="text" name="bosted"><br>










    skriv inn bio
    <br><input type="text" name="bio"><br>
    <input type="submit" name="soobmit" value="lag profil"> 
</form>


<?php
include "connect.php";

if (isset($_POST["soobmit"])) {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $passord = $_POST["passord"];
    $bio = $_POST["bio"];
    $epost = $_POST["epost"];
    $tlf = $_POST["tlf"];
    $skolejobb = $_POST["skole_jobb"];
    $bosted = $_POST["bosted"];




    $sql = "INSERT INTO bruker (brukernavn, fornavn, etternavn, bio, passord, epost, tlf, skole_jobb,  bosted) VALUES ('$brukernavn','$fornavn', '$etternavn', '$bio', '$passord', '$epost','$tlf','$skolejobb', '$bosted')";

    if($con->query($sql)) {
    echo "bruker lagt til";
    }

} //slutt på if post isset

?>