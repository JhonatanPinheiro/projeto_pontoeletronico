<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(dirname(__FILE__, 2) . '/src/config/database.php');

Database::getConnection();
