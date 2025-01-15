<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(dirname(__FILE__, 2) . '/src/config/database.php');

#Database::getConnection();

$sql = 'SELECT * FROM users';
$result = Database::getResultFromQuery($sql);

while ($row = $result->fetch_assoc()) {
    print_r($row);
    echo '<br>';
}
