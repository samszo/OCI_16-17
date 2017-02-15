<?php
header('Content-Type: text/html; charset=utf-8');
$arrUrl = array(
	"OCI1617data"=>"https://docs.google.com/spreadsheets/d/1ZQEgufeLE5I3WyJZ8_bmlVT6c9wRap4L4TAQ_7LRHQw/pub?gid=1596717779&single=true&output=csv"
);
$_GET['url'] = 	"OCI1617data";
curl($arrUrl[$_GET['url']]);
function curl($url){
	$handle = curl_init();
	curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($handle);
    curl_close($handle);
    
    echo $response;
}