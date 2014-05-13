<?php

/**
 * Adds support for mobile devices.
 * This includes meta headers, touch icons and other stuff related to Pematon's custom theme.
 *
 * @author Peter Knut
 * @copyright 2014 Pematon, s.r.o. (http://www.pematon.com/)
 */
class AdminerTheme
{

	function head()
	{
		$userAgent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");

		?>

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, target-densitydpi=medium-dpi"/>

		<?php if (strpos($userAgent, "iPhone") !== false || strpos($userAgent, "iPad") !== false): ?>
			<link rel="apple-touch-icon-precomposed" href="images/touchIcon.png"/>

		<?php elseif (strpos($userAgent, "Android") !== false): ?>
			<link rel="apple-touch-icon-precomposed" href="images/touchIcon-android.png"/>

		<?php elseif (strpos($userAgent, "Windows") !== false): ?>
			<meta name="application-name" content="Adminer"/>
			<meta name="msapplication-TileColor" content="#ffffff"/>
			<meta name="msapplication-square150x150logo" content="images/tileIcon.png"/>
			<meta name="msapplication-wide310x150logo" content="images/tileIcon-wide.png"/>

		<?php elseif (strpos($userAgent, "BlackBerry") !== false || strpos($userAgent, "PlayBook") !== false): ?>
			<link rel="apple-touch-icon" href="images/touchIcon.png"/>
		<?php endif; ?>

		<script>
			window.addEventListener("load", function() {
				var menu = document.getElementById("menu");
				var button = menu.getElementsByTagName("h1")[0];
				if (!menu || !button)
					return;

				button.addEventListener("click", function() {
					if (menu.className.indexOf(" open") >= 0)
						menu.className = menu.className.replace(/ *open/, "");
					else
						menu.className += " open";
				}, false);
			}, false);

		</script>

		<?php
	}
}
