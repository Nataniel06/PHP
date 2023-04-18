<?php
$sql = "SELECT * FROM Innlegg_kommentar JOIN bruker ON Innlegg_kommentar.idbruker=bruker.idbruker WHERE idinnlegg='$idinnlegg' ";
$resultat_kommentar = $con->query($sql);
    while($rad = $resultat_kommentar->fetch_assoc()) { # loop gjennom alle brukere
        echo "<div class='card__content'>";
        $kommentar_tekst = $rad['tekst']; 
        $dato_opprettet = $rad['date'];
        $brukernavn = $rad['brukernavn'];

        echo "$brukernavn: $kommentar_tekst: $dato_opprettet<br>";


    }
?>