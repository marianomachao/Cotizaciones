<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('get_api_key')) 
{
    function get_api_key() {
    	$CI = & get_instance();
    	return $CI->config->item('internal_api_key');
    }
}