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
$contact_form = 'contact_form';

$section = (isset($_GET['section'])) ? $_GET['section'] : 'default';
require_once 'contr/' . $section . '.php';

require_once 'views/main.html';
