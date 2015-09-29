<?php

/**
 * Adds support for Pematon's custom theme.
 * This includes meta headers, touch icons and other stuff.
 *
 * @author Peter Knut
 * @copyright 2014-2015 Pematon, s.r.o. (http://www.pematon.com/)
 */
class AdminerTheme
{
	/** @var string */
	private $themeName;

	/**
	 * @param string $themeName File with this name and .css extension should be located in css folder.
	 */
	function AdminerTheme($themeName = "default-orange")
	{
		define("PMTN_ADMINER_THEME", true);

		$this->themeName = $themeName;
	}

	/**
	 * Prints HTML code inside <head>.
	 * @return false
	 */
	public function head()
	{
		$userAgent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
		?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, target-densitydpi=medium-dpi"/>

		<link rel="icon" type="image/ico" href="images/favicon.png">

		<?php
			// Condition for Windows Phone has to be the first, because IE11 contains also iPhone and Android keywords.
			if (strpos($userAgent, "Windows") !== false):
		?>
			<meta name="application-name" content="Adminer"/>
			<meta name="msapplication-TileColor" content="#ffffff"/>
			<meta name="msapplication-square150x150logo" content="images/tileIcon.png"/>
			<meta name="msapplication-wide310x150logo" content="images/tileIcon-wide.png"/>

		<?php elseif (strpos($userAgent, "iPhone") !== false || strpos($userAgent, "iPad") !== false): ?>
			<link rel="apple-touch-icon-precomposed" href="images/touchIcon.png"/>

		<?php elseif (strpos($userAgent, "Android") !== false): ?>
			<link rel="apple-touch-icon-precomposed" href="images/touchIcon-android.png?2"/>

		<?php else: ?>
			<link rel="apple-touch-icon" href="images/touchIcon.png"/>
		<?php endif; ?>

		<link rel="stylesheet" type="text/css" href="css/<?php echo htmlspecialchars($this->themeName) ?>.css?2">

		<script>
			(function(window) {
				"use strict";

				window.addEventListener("load", function() {
					prepareMenuButton();
				}, false);

				function prepareMenuButton() {
					var menu = document.getElementById("menu");
					var button = menu.getElementsByTagName("h1")[0];
					if (!menu || !button) {
						return;
					}

					button.addEventListener("click", function() {
						if (menu.className.indexOf(" open") >= 0) {
							menu.className = menu.className.replace(/ *open/, "");
						} else {
							menu.className += " open";
						}
					}, false);
				}

			})(window);

		</script>

		<?php

		// Return false to disable linking of adminer.css and original favicon.
		// Warning! This will stop executing head() function in all plugins defined after AdminerTheme.
		return false;
	}
}
