<?php

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pdo_test');
require_once(dirname(__FILE__).'/pdo.php');
$db = new mPDO(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$query = $db->query("SELECT * FROM `customer` WHERE `name` LIKE 'John'");
if ($query->rows) {
    var_dump($query->row['email']);
}

?>
