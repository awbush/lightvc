Routes
======

LightVC has extremely powerful routing options and the ability to take customized routers.  LightVC comes with `Lvc_GetRouter`, `Lvc_RewriteRouter`, and `Lvc_RegexRewriteRouter`.

If mod_rewrite is available, the regex rewrite router is likely to be all that's needed.

The `webroot/index.php` file might contain:

	$fc = new Lvc_FrontController();
	$fc->addRouter(new Lvc_RegexRewriteRouter($regexRoutes));
	$fc->processRequest(new Lvc_HttpRequest());

All that's missing is the contents of `$regexRoutes`.  Here are the routes the LightVC website uses:

	<?php
	
	// Format of regex => parseInfo
	$regexRoutes = array(
	
		// Map nothing to the home page.
		'#^$#' => array(
			'controller' => 'page',
			'action' => 'view',
			'action_params' => array(
				'page_name' => 'home',
			),
		),
		
		// Allow direct access to all pages via a "/page/page_name" URL.
		'#^page/(.*)$#' => array(
			'controller' => 'page',
			'action' => 'view',
			'action_params' => array(
				'page_name' => 1,
			),
		),
		
		// Allow direct access to all docs via a "/docs/doc_name" URL.
		'#^docs/(.*)$#' => array(
			'controller' => 'docs',
			'action' => 'view',
			'action_params' => array(
				'doc_name' => 1,
			),
		),
		
		// Map controler/action/params
		'#^([^/]+)/([^/]+)/?(.*)$#' => array(
			'controller' => 1,
			'action' => 2,
			'additional_params' => 3,
		),
		
		// Map controllers to a default action (not needed if you use the
		// Lvc_Config static setters for default controller name, action
		// name, and action params.)
		'#^([^/]+)/?$#' => array(
			'controller' => 1,
			'action' => 'index',
		),
	
	);
	
	?>

As of [version 1.0.4](../../../CHANGELOG.md), the `Lvc_RegexRewriteRouter` allows a redirect parameter instead of the controller/action parameters.  This allows a route to redirect to another page instead of loading up a controller/action.

Static Examples:

	'#^test/?$#' => array(
		'redirect' => '/some/other/page/'
	),
	'#^test2/?$#' => array(
		'redirect' => 'http://lightvc.org/'
	),

Dynamic Example:

	'#^test/([^/]*)/?$#' => array(
		'redirect' => '/faq/$1'
	),

Basically, the value of the redirect option is used as the replacement variable for PHP's [preg_replace](http://www.php.net/manual/en/function.preg-replace.php) function.  That is how the dynamic example works.


The above examples should be enough to explain how to add routes for the `Lvc_RegexRewriteRouter`, but to be clear:

* When specifying the parse info, use a string to use a specific value, or an integer to use the value from the regex match.
* `controller` specifies the controller name to use.
* `action` specifies the action name to invoke.
* `action_params` specifies an array of parameter names and values to use.
	* Parameter names do not have to be included;  They are only useful if `Lvc_Config::setSendActionParamsAsArray(true);` is used.
* `additional_params` should be an integer specifying which regex match to use for parsing additional parameters out of the URL.
* Instead of any of the above, `redirect` can be specified to have the browser redirected to another page.

Those unfamiliar with regex might want to look at the [pattern syntax](http://php.net/manual/en/reference.pcre.pattern.syntax.php).
