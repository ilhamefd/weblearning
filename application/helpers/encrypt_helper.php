<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	START Core Helper
*/

# untuk print_f
function strEncrypt($str, $forDB = FALSE){
	$CI =& get_instance();
	$key    = $CI->config->item('encryption_key');

	$str    = ($forDB) ? 'md5(concat(\'' . $key . '\',' . $str . '))' : md5($key . $str);
	return $str;
}

?>