<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "vote";
$route[''] = 'vote/index';
//$route['(.*)'] = "vote/index/$1";

// To be able to add customs controllers
// 1. Comment the previous line : $route['(.*)'] = "vote/index/$1";
// 2. Uncomment these lines
$route['404_override'] = 'vote';
$route['(.*)'] = "/$1";