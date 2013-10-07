<?php
$db = " (DESCRIPTION = 
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
(CONNECT_DATA = (SID = *seu_sid_aqui*))
)";
$conn = OCILogon("seu_user","sua_senha", $db);
?>
