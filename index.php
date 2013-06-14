<?php
error_reporting(E_ALL);

define('ACCESS', TRUE);

require 'conf/conf.php';
require 'func/db.php';

$db = connect();

$section = (isset($_GET['section'])) ? $_GET['section'] : 'default';
require_once 'contr/'.$section.'.php';

require_once 'views/main.html';