<?php
function Template($file, $params = array()) {
	foreach($params as $k => $v) {
		$$k = $v;
	}

	ob_start();
	include $file;
	return ob_get_clean();
}