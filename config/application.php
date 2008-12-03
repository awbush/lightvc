<?php

// Derived Constants
// (NOTE that these are not needed by LightVC, but are usually useful in the app layer.)
define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('WWW_BASE_PATH', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('WWW_CSS_PATH', WWW_BASE_PATH . 'css/');
define('WWW_JS_PATH', WWW_BASE_PATH . 'js/');
define('WWW_IMAGE_PATH', WWW_BASE_PATH . 'images/');

// Include and configure the LighVC framework
include_once(APP_PATH . 'modules/lightvc.php');
Lvc_Config::addControllerPath(APP_PATH . 'controllers/');
Lvc_Config::addControllerViewPath(APP_PATH . 'views/');
Lvc_Config::addLayoutViewPath(APP_PATH . 'views/layouts/');
Lvc_Config::addElementViewPath(APP_PATH . 'views/elements/');
Lvc_Config::setViewClassName('AppView');

// Lvc doesn't autoload the AppController, so we have to do it: (this also means we can put it anywhere)
include(APP_PATH . 'classes/AppController.class.php');
include(APP_PATH . 'classes/AppView.class.php');

// Load Routes
include(dirname(__FILE__) . '/routes.php');

?>