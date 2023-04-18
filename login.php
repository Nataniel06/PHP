<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form method='POST' action="">
        Brukernavn
        <input type="text" name='brukernavn'>
        Passord
        <input type="password" name='passord'>
        <input type="submit" name='submit_login' value="Logg på"> <br>
        <a href="laggtil.php">Lag bruker</a> </br>
    </form>
    <?php 
        if(isset($_POST['submit_login'])) { # hvis submit_login knappet er trykket
            include "connect.php";
            
            
            
            $brukernavn = $_POST['brukernavn'];
            $passord_skjema = $_POST['passord'];
              
            $sql = "SELECT fornavn, brukernavn, passord, idbruker FROM bruker WHERE brukernavn='$brukernavn'";
            $resultat = $con->query($sql); # henter ut fra DB
 
            $rad = $resultat->fetch_assoc();
            
            if ($rad['passord'] == $passord_skjema) {
                echo "Du er logget inn";
 
                session_start();
                $_SESSION['login_id'] = $rad['idbruker'];
                $_SESSION['fornavn'] = $rad['fornavn'];
                header("Refresh:1; url=index.php", true, 303);

            } else {
                echo "Feil passord";
            }





 
            
 
        }
        
    ?>
 
</body>