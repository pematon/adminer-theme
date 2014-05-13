Theme for Adminer
=================

Responsive touch-friendly theme for Adminer database tool ([www.adminer.org](http://www.adminer.org/)).

<img src="http://pematon.github.io/screenshots/adminer.png?2" width="728px" />

This bundle contains CSS, images, font with icons and plugin AdminerTheme that provides support for mobile devices.

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
			new AdminerTheme(),
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
	- AdminerTheme.php
	- plugin.php
- adminer.css
- adminer.php
- index.php
```

## Compatibility
Theme is compatible with Adminer 4.1.x.

Only last versions of modern web browsers are supported. There is no backward compatibility with old versions (especially IE).

## All-in-one
You can try our custom configuration in all-in-one bundle: [github.com/pematon/adminer-custom](https://github.com/pematon/adminer-custom)

## References
Amazing **Entypo** pictograms are created by Daniel Bruce ([www.entypo.com](http://www.entypo.com/)).