<?php
function baseurl() {
	$CI = & get_instance();
	return $CI->config->item('base_url');
}

function asset_url() {
	$CI = & get_instance();
	return $CI->config->item('assets_url');
}

function api_url() {
	$CI = & get_instance();
	$url = baseurl().$CI->config->item('api_uri');
	return $url;
}
?>