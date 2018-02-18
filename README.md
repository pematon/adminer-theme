Theme for Adminer
=================

Responsive touch-friendly theme for Adminer database tool ([www.adminer.org](http://www.adminer.org/)).

<img src="http://pematon.github.io/screenshots/adminer.png?4" width="728px" />

Three color variants included.

<img src="http://pematon.github.io/screenshots/adminer-vriants.png" width="620px" />

You can also try our useful [**plugins**](https://github.com/pematon/adminer-plugins) or our custom Adminer configuration in [**all-in-one bundle**](https://github.com/pematon/adminer-custom).

## Compatibility
Minimal requirements are: PHP 5.4, Adminer 4.6.1, modern web browser.

## How to use

1. [Download](http://www.adminer.org/#download) and install Adminer tool.

2. Download all content from /lib folder right next to adminer.php.

File structure will be:
```
- css
- fonts
- images
- plugins
- adminer.php
```

3. Create index.php file and [configure plugins](http://www.adminer.org/plugins/#use). Don't forget to copy official [plugin.php](https://raw.githubusercontent.com/vrana/adminer/master/plugins/plugin.php) into the `plugins` folder.

```php
<?php

	function adminer_object()
	{
		// Required to run any plugin.
		include_once "./plugins/plugin.php";

		// Plugins auto-loader.
		foreach (glob("plugins/*.php") as $filename) {
			include_once "./$filename";
		}

		// Specify enabled plugins here.
		$plugins = [
			// AdminerTheme has to be the last one!
			new AdminerTheme(),
			
			// Color variant can by specified in constructor parameter.
			// new AdminerTheme("default-orange"),
			// new AdminerTheme("default-blue"),
			// new AdminerTheme("default-green", ["192.168.0.1" => "default-orange"]),
		];

		return new AdminerPlugin($plugins);
	}

	// Include original Adminer or Adminer Editor.
	include "./adminer.php";
```

Final file structure will be:
```
- css
- fonts
- images
- plugins
	- AdminerTheme.php
	- plugin.php
- adminer.php
- index.php
```

## References
Amazing **Entypo** pictograms are created by Daniel Bruce ([www.entypo.com](http://www.entypo.com/)).
