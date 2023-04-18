<?php


$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($con, 
"basednataniel.mysql.database.azure.com", 
"Nataniel", "Peking23", 
"tibet", 3306, MYSQLI_CLIENT_SSL);

?>