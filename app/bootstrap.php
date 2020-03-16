<?php
//it will require all the nescessary files that we need in index.php
// require_once 'config/config.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Core.php';
// require_once 'libraries/Database.php';
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/externals/PHPMailer/PHPMailer.php';
require_once 'helpers/externals/PHPMailer/Exception.php';
require_once 'helpers/externals/PHPMailer/SMTP.php';
require_once  'helpers/externals/googleapi/vendor/autoload.php';
require_once 'helpers/externals/SDK/aws-autoloader.php';
//add autoloader file here so that all the required file get automatically loaded.
spl_autoload_register(function($className)
{
    require_once 'libraries/'.$className.'.php';
})



?>

