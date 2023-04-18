<form method="POST">
 

    lag innlegg
    <br><input type="text" name="tekst"><br><br>
    <input type="submit" name="soobmit" value="legg ut innlegg"> 

</form>
<?php


if (isset($_POST["soobmit"])) {
    include "connect.php";
    $tekst = $_POST["tekst"]; 
    $sql = "INSERT INTO innlegg (tekst, idbruker, date) VALUES ('$tekst','$id', now() )";
    
    if($con->query($sql)){
        echo "Innlegg ble lagt til";
    } else {
        echo "Feilmelding: $con->error";
    }
}

?>