<?php

use BHPGenerator\Generate;

//--------------------------------------------------------------------
// End of docuemnt
//--------------------------------------------------------------------
echo PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | External JS.
//--------------------------------------------------------------------
if (! empty($options['external_js']) && Generate::$assetsReConfig == false)
{
	for ($i=0; $i < count($options['external_js']) ; $i++)
	{
		echo str_pad(' ', 2).script_tag($options['external_js'][$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

if (! empty(Generate::$assetsFooter['external_js']))
{
	for ($i=0; $i < count(Generate::$assetsFooter['external_js']) ; $i++)
	{
		echo str_pad(' ', 2).script_tag(Generate::$assetsFooter['external_js'][$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Directed JS.
//--------------------------------------------------------------------
if (! empty($options['directed_js']) && Generate::$assetsReConfig == false)
{
	echo str_pad(' ', 2).'<script type="text/javascript">'.$options['directed_js'].'</script>'.PHP_EOL.PHP_EOL;
}

if (! empty(Generate::$assetsFooter['directed_js']))
{
	echo str_pad(' ', 2).'<script type="text/javascript">'.Generate::$assetsFooter['directed_js'].'</script>'.PHP_EOL.PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Cookie JS.
//--------------------------------------------------------------------

echo str_pad(' ', 2).'<!-- Load Cookie JS -->'.PHP_EOL;
echo str_pad(' ', 2).'<script type="text/javascript" id="cookieinfo" src="https://cookieinfoscript.com/js/cookieinfo.min.js"></script>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize Pre-Load JS.
//--------------------------------------------------------------------

echo str_pad(' ', 2).'<!-- Pre-Load Screen JS -->'.PHP_EOL;
echo str_pad(' ', 2).'<script type="text/javascript">$(document).ready(function(){$(".preloader").fadeOut(); })</script>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Close | Body tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'</body>'.PHP_EOL;
//--------------------------------------------------------------------
// Close | Html tag.
//--------------------------------------------------------------------
echo '</html>';

//--------------------------------------------------------------------
// Everything is done. Asset has finished their job & Reset the val
//--------------------------------------------------------------------
