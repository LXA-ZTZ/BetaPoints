<?php
include('EstablishAccess.php');
	$connctn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
    if (!$connctn) {
        die('Not connected : ' . mysql_error());
    }
    // make foo the current db
    $db_selected = mysql_select_db('BetaPoints', $connctn);
    if (!$db_selected) {
        die ('Can\'t use foo : ' . mysql_error());
    }
$query=mysql_query("SELECT u.username AS MyUsers, u.password AS zeta, SUM( t2.EValue ) AS Total
FROM login u, userandevents t1, evets t2
WHERE t1.eID = t2.EName
AND u.password = t1.zeta
GROUP BY u.username");
echo $query;


?>