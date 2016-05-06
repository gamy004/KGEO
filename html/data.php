<?php
	$start = (int) $_GET['start'];
	$end   = (int) $_GET['end'];

	$dbconn = pg_connect("host=localhost port=5432 dbname=KGEODB user=postgres password=1234")
    or die('Could not connect: ' . pg_last_error());

	// Performing SQL query
	$query = 'SELECT * FROM "MSGTEXT" LIMIT '.($end - $start).' OFFSET '.$start;
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	echo "<table>\n";
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	echo "</table>\n";
?>