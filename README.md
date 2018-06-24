[![Latest Stable Version](https://poser.pugx.org/zakir-hyder/citrix-gotowebinar-php-library/v/stable)](https://packagist.org/packages/zakir-hyder/citrix-gotowebinar-php-library)[![License](https://poser.pugx.org/zakir-hyder/citrix-gotowebinar-php-library/license)](https://packagist.org/packages/zakir-hyder/citrix-gotowebinar-php-library)

Citrix's GoToWebinar PHP Library
==========================

The GoToWebinar PHP Library is typically used to perform operations like create registrant of webinar, get the login url, list webinars etc.  the PHP Library greatly simplifies the process of authentication and authorizing users for your app. This lib needs JSON and  CURL PHP extension.

You will need an API key to initialize the Library, which you can obtain from https://developer.citrixonline.com/sdm/myprofile. Apply for Developer Key on https://developer.citrixonline.com/sdm/set_app/Production. Be sure to check GoToWebinar as Product API. Then you will see the API key on https://developer.citrixonline.com/sdm/myprofile. If you are not registered, first register yourself on here https://developer.citrixonline.com/user/register. Then Apply for Developer Key. Be sure to check GoToWebinar as Product API. Then you will see the API key on https://developer.citrixonline.com/sdm/myprofile. 

Installing and Initializing
-----

To install the PHP Library, extract the downloaded files and copy the citrix.php from the directory to a directory on the server where you will host your app. Then, just include citrix.php wherever you want to use the PHP Library. 

You will need an app id to initialize the Library, which you can obtain from your developer profile https://developer.citrixonline.com/sdm/myprofile.

First include the citrix.php in you code. You use the Library by instantiating a new Facebook object with, at a minimum, your app id and app secret:

include "citrix.php";

    $citrix = new Citrix('API Key');
    $organizer_key = $citrix->get_organizer_key();


Usage
-----

To get current Organizer Key

    $organizer_key = $citrix->get_organizer_key();

If Organizer Key is empty, create login url. If not parameter is passed then redirect url will be the current url. If you want to redirect to another url, pass the url on the function. But remember the redirect url must be on the same domain that you created the app for.

    if(!$organizer_key)
    {
    	$url = $citrix->auth_citrixonline();
    	echo "<script type='text/javascript'>top.location.href = '$url';</script>";
    	exit;
    }


To Get access token 

    $url = $citrix->get_access_token();

I will suggest to save the user's access token and organizer key in Database. So that user does not have to authorize your app every time they user you app/website.

To load access token and organizer key

    $citrix->set_organizer_key('organizer_key');
    $citrix->set_access_token('access_token');


Get list of webinars 

    $webinars = $citrix->citrixonline_get_list_of_webinars() ;

If you want to get previous webinars along with future webinars pass 1 as parmeter ex citrixonline_get_list_of_webinars(1).

To create registrant of a webinar - you have to provide webinar id, first name, last name and email.

    try
    {
    	$response = $citrix->citrixonline_create_registrant_of_webinar('webinar id', $data = array('first_name' => 'First Name', 'last_name' => 'Lastnmae', 'email'=>'email@email.com')) ;
    	$citrix->pr($response);
    }catch (Exception $e) {	
    	$citrix->pr($e->getMessage());
    }


To get registrants of a webinar

    try
    {
    	$webinars = $citrix->get_registrants_of_webinars('webinar id') ;
    	$citrix->pr($webinars);
    }catch (Exception $e) {	
    	$citrix->pr($e->getMessage());
    }


To delete registrant of a webinar

    try
    {
        $citrix->citrixonline_delete_registrant_of_webinar('webinar id', 'registrant id') ;
    }catch (Exception $e) { 
        $citrix->pr($e->getMessage());
    }    


$citrix->pr() is Print_r convenience function. I have created two example files - login.php and api example.php. login.php shows you how to the lib to authorize user with your app. example.php show all api calls.

### Creators

[Zakir Hyder](https://github.com/zakir-hyder)  

## License

Citrix's GoToWebinar PHP Library is available under the MIT license. See the LICENSE file for more info.
