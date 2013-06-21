<?php

error_reporting(E_ALL);
date_default_timezone_set('Europe/Riga');

define('ACCESS', TRUE);

require 'conf/conf.php';
require 'func/db.php';

$db = connect();

$header = 'header';
$article = NULL;
$footer = 'footer';
//$login = NULL;
$upload = 'upload';

$section = (isset($_GET['section'])) ? $_GET['section'] : 'default';
$url_prefix = (isset($_GET['section'])) ? '../' : NULL;

require_once 'contr/' . $section . '.php';

require_once 'views/main.html';
