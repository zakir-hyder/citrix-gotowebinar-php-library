<?php
include "citrix.php";

$citrix = new Citrix('API Key');

$citrix->set_organizer_key('organizer_key');
$citrix->set_access_token('access_token');

try
{
	$organizer_key = $citrix->get_organizer_key();
	$citrix->pr($organizer_key);
}catch (Exception $e) {	
	$citrix->pr($e->getMessage());
}

try
{
	$webinars = $citrix->citrixonline_get_list_of_webinars() ;
	$citrix->pr($webinars);
}catch (Exception $e) {	
	$citrix->pr($e->getMessage());
}

try
{
	$response = $citrix->citrixonline_create_registrant_of_webinar('webinar id', $data = array('first_name' => 'First Name', 'last_name' => 'Lastnmae', 'email'=>'email@email.com')) ;
	$citrix->pr($response);
}catch (Exception $e) {	
	$citrix->pr($e->getMessage());
}

try
{
	$webinars = $citrix->get_registrants_of_webinars('webinar id') ;
	$citrix->pr($webinars);
}catch (Exception $e) {	
	$citrix->pr($e->getMessage());
}

try
{
    $citrix->citrixonline_delete_registrant_of_webinar('webinar id', 'registrant id') ;
}catch (Exception $e) { 
    $citrix->pr($e->getMessage());
}  