<?php 
require_once '../autoload.php';
require_once '../include/results.php';

if(isset($_GET['search']))
{

	$search = new Search($db);
	$search->user($_GET['search']);
	$search->tag($_GET['search']);
	$search_user = $search->user($_GET['search']);
	$search_tag = $search->tag($_GET['search']);
}
else {
	$_GET['search'] = '';
}
require_once '../view/search.php';

?>