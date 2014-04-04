<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
$config['module']['vote'] = array
(
    'module' => "Vote",
    'name' => "Vote Module",
    'description' => "Vote module. Manage votes.",
    'author' => ",
    'version' => "0.1",
    'uri' => 'vote',
    'has_admin'=> TRUE,
    'has_frontend'=> TRUE,
);

return $config['module']['vote'];