<?php

/**
 * EShop
 *
 * @author          Timothy Edoja
 * @author_facebook http://www.facebook.com/timothyedoja
 * @author_twitter  http://www.twitter.com/timothyedoja
 * @copyright       2018 Timothy Edoja
 *
 * @version 1
 */

/*
	This is the starting point on which EShop functions.
	Everything should start here, so all the setup and security is done properly.
*/

// ------------------------------------------------------------------------------------------------------------------

// Starting application.
$startTime = microtime(true);

// Start the output buffer.
ob_start("ob_gzhandler");

// Start the session.
session_start();

// ------------------------------------------------------------------------------------------------------------------

// Load PHPMailer.
require_once 'vendor/phpmailer/src/Exception.php';
require_once 'vendor/phpmailer/src/OAuth.php';
require_once 'vendor/phpmailer/src/POP3.php';
require_once 'vendor/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/src/SMTP.php';

// Load TPHPLib.
require_once("vendor/tphplib/TextUtils.php");

// Load classes.
require_once("eshop/classes/SettingsAndFunctions.php");
require_once("eshop/classes/Mail.php");
require_once("eshop/classes/Image.php");

// Load model.
require_once("eshop/models/Datasource.php");
require_once("eshop/models/mysql/MySQLDatasource.php");
require_once("eshop/models/mysql/cart/ProductCategoriesTable.php");
require_once("eshop/models/mysql/cart/ProductsTable.php");

// Load view.

// Load controllers.

// ------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------

// Initialize variables.
$settingsAndFunctions = new SettingsAndFunctions();
$settingsAndFunctions->startTime = $startTime;

$applicationName = $settingsAndFunctions->settingsArray['APPLICATION_NAME'];
$applicationTitle = $settingsAndFunctions->settingsArray['APPLICATION_TITLE'];
$applicationIcon = $settingsAndFunctions->settingsArray['APPLICATION_ICON'];
$applicationAuthor = $settingsAndFunctions->settingsArray['APPLICATION_AUTHOR'];
$applicationAuthorURL = $settingsAndFunctions->settingsArray['APPLICATION_AUTHOR_URL'];
$applicationDescription = $settingsAndFunctions->settingsArray['APPLICATION_DESCRIPTION'];
$applicationKeywords = $settingsAndFunctions->settingsArray['APPLICATION_KEYWORDS'];
$applicationURL = $settingsAndFunctions->settingsArray['APPLICATION_URL'];

// Dispatch request.
require_once("eshop/requestdispatcher.php");

// ------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------

// Clean Up Memory...

$startTime = null;
$settingsAndFunctions->finalizeAndclose();
$settingsAndFunctions = null;
$applicationName = null;
$applicationTitle = null;
$applicationIcon = null;
$applicationAuthor = null;
$applicationAuthorURL = null;
$applicationDescription = null;
$applicationKeywords = null;
$applicationURL = null;

// ------------------------------------------------------------------------------------------------------------------

// Flush the output buffer.
ob_end_flush();

?>
