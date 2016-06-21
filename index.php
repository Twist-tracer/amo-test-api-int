<?php 
require 'model.php';

$request_str = file_get_contents('query.php', NULL, NULL, 8);

$page = Template("template.php", array(
   "request_str" => $request_str,
));

echo $page;