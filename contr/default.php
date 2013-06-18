<?php
$nav_links=array(
	'link1'=>'#',
	'link2'=>'#',
	'link3'=>'#'
);

$header = 'header';
$article = 'article';
$footer = 'footer';
//$art = get('articles', $db);
$art = query( 'SELECT heading, article, time, name FROM articles INNER JOIN users ON articles.author_id = users.id', $db);
