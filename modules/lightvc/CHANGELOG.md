Changelog
=========

1.0.4 (2008-03-15)
------------------

Changes to LightVC module:

* Added redirect option to the `Lvc_RegexRewriteRouter`.  See [route documentation](docs/user_guide/configuration/routes.md) for its usage.

* Added public method `getActionName()` to the base controller, `Lvc_PageController`, so you no longer have to use `$this->actionName` (although that will still work from within the controller).


1.0.3 (2008-03-14)
------------------

Changes to LightVC module:

* Improved error messages for HTTP requests (now includes the requested URL).  Other request types (that extend `Lvc_Request`) can take advantage of this by overriding the `getAdditionalErrorInfo()` method; See the `Lvc_HttpRequest` class in the source for an example of that.

Changes to skeleton app:

* Updated documentation on the default page that comes up (controllers/app.php was moved to classes/AppController.class.php).


1.0.2 (2007-12-06)
------------------

No changes to LightVC itself, only the following changes to the skeleton app:

* Changed page controller so that extra slashes added to the URL (and thus the page name) won't result in a page not found.
* Updated README.txt with new lightvc.org URLs.


1.0.1 (2007-11-18)
------------------

No changes to LightVC itself, only the following changes to the skeleton app:

* Added error codes to the error controller and input checking.
* Added input checking to the page controller.
* Changed ol styling to be the same as ul in master.css.


1.0 (2007-11-13)
----------------

* Initial public release.

