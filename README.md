Theme and plugins for Adminer
=============================

Responsive theme and plugins for Adminer database tool (http://www.adminer.org/).

<img src="http://pematon.github.io/screenshots/adminer.png?2" width="728px" />

## Plugins

### AdminerMobile

Adds support for mobile devices. This plugin is required if you want to use our theme on mobile devices.

### AdminerJsonPreview

Displays JSON data preview as a table.

<img src="http://pematon.github.io/screenshots/json-table.png" width="400px" />

## How to use

1. [Download](http://www.adminer.org/#download) and install Adminer tool.

2. Download all content from /lib folder right next to adminer.php.

File structure will be:
```
- fonts
- images
- plugins
- adminer.css
- adminer.php
```

3. Create index.php file and [configure plugins](www.adminer.org/plugins/#use).

```php
<?php

	function adminer_object()
	{
		// required to run any plugin
		include_once "./plugins/plugin.php";

		// autoloader
		foreach (glob("plugins/*.php") as $filename) {
			include_once "./$filename";
		}

		$plugins = array(
			// specify enabled plugins here
			new AdminerMobile(),
			new AdminerJsonPreview(),
		);

		return new AdminerPlugin($plugins);
	}

	// include original Adminer or Adminer Editor
	include "./adminer.php";
```

Final file structure will be:
```
- fonts
- images
- plugins
	- plugin.php
	- ...
- adminer.css
- adminer.php
- index.php
```

## Compatibility
Theme is compatible with Adminer 4.1.x.

Only last versions of modern web browsers are supported. There is no backward compatibility with old versions (especially IE).
