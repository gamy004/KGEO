<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=KGEODB user=postgres password=1234")
    or die('Could not connect: ' . pg_last_error());
?>