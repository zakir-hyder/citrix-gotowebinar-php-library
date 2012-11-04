<?php
include "citrix.php";

$citrix = new Citrix('API Key');
$organizer_key = $citrix->get_organizer_key();

//$citrix->pr($organizer_key);

if(!$organizer_key)
{
	$url = $citrix->auth_citrixonline();
	echo "<script type='text/javascript'>top.location.href = '$url';</script>";
	exit;
}

$citrix->pr($citrix->get_organizer_key());
$citrix->pr($citrix->get_access_token());