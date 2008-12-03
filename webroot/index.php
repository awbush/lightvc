<?php

if (isset($_GET['url']) && $_GET['url'] === 'favicon.ico') {
	
	// Avoid "not found" errors for favicon, which is automatically requested by most browsers.
	
} else {
	
	// Load core application config
	include_once('../config/application.php');

	try {
		
		// Process the HTTP request using only the routers we need for this application.
		$fc = new Lvc_FrontController();
		$fc->addRouter(new Lvc_RegexRewriteRouter($regexRoutes));
		$fc->processRequest(new Lvc_HttpRequest());
		
	} catch (Lvc_Exception $e) {
		
		// Log the error message
		error_log($e->getMessage());

		// Get a request for the 404 error page.
		$request = new Lvc_Request();
		$request->setControllerName('error');
		$request->setActionName('view');
		$request->setActionParams(array('error' => '404'));

		// Get a new front controller without any routers, and have it process our handmade request.
		$fc = new Lvc_FrontController();
		$fc->processRequest($request);
		
	} catch (Exception $e) {
		
		// Some other error, output "technical difficulties" message to user?
		error_log($e->getMessage());
		
	}
}

?>