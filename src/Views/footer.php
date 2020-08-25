<?php

//--------------------------------------------------------------------
// End of docuemnt
//--------------------------------------------------------------------

echo PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | External JS.
//--------------------------------------------------------------------
if (! empty($external_js))
{
	echo str_pad(' ', 2).'<!-- Load external JS  -->'.PHP_EOL;
	for ($i=0; $i < count($external_js) ; $i++)
	{
		echo str_pad(' ', 2).script_tag($external_js[$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Directed JS.
//--------------------------------------------------------------------
if (! empty($directed_js))
{
	echo str_pad(' ', 2).'<!-- Load directed JS -->'.PHP_EOL;
	echo str_pad(' ', 2).'<script type="text/javascript">'.$directed_js.'</script>'.PHP_EOL.PHP_EOL;
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
// Everything is done. Asset has finished their job.
//--------------------------------------------------------------------