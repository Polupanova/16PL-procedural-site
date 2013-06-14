<? php
//$array1= array('links1','links2','links3','links4');

$assoc= array(array('title' => 'links1', 'link' => 'links1.php' ),
        array('title' => 'links2', 'link' => 'links2.php'),
		array('title' => 'links3', 'link' => 'links3.php'),
		array('title' => 'links4', 'link' => 'links4.php'));

$nav_links=array(
	'link1'=>'#',
	'link2'=>'#',
	'link3'=>'#'
);

$article = 'article';
/*$fn = function($arr) use ($array1) {
    return !in_array($arr['title'], $array1);
};
$result =array_filter($assoc, $fn);*/

?>