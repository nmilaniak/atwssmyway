<!-- run as: php db-test.php -->
<?php

require_once('config/oracle.php');

date_default_timezone_set('Europe/Berlin');

$conn = oci_connect($conf['user'], $conf['password'], $conf['host']) or die(oci_error());

$sql = oci_parse($conn, "select * from view_interventions");
oci_execute($sql) or die(oci_error($sql));
$nrows = oci_fetch_all($sql, $intervention);

echo "# of rows ".$nrows."\n";

oci_free_statement($sql);
oci_close($conn);

?>
