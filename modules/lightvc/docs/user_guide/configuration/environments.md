Environments
============

Environment switching features are not the scope of an MVC (maybe a full framework though).

However, here are some suggestions:

First, create an environments directory in the `app/config` directory and put the needed environments in there:

	app/config/environments/
		dev.php
		production.php
		test.php

Then, setup a way to include the appropriate one.  For example:

* Create symbolic link to the environment config to use on each server (and have version control ignore the link).
* Create a file `environment_name`, put the name of the environment to use inside it, and have the application config open the file to read the name of which config to use.  (Setup version control to ignore the `environment_name` file.)
* Do hostname based switching to figure out which file to include.
* Use `SetEnv` in the web server configuration to set the name of the environment to use.
