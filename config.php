<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('713108534292-n3go7vq3lpsqt46ngplso6r3dra26b6n.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/hostel2.O/loginwithgoogle.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>