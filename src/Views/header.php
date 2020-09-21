<?php

use BHPGenerator\Generate;

if ( ! function_exists('meta'))
{
	/**
	 * Generates meta tags from an array of key/values
	 *
	 * @param	array
	 * @param	string
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	function meta(string $name = '', string $content = '', string $type = 'name', string $newline = PHP_EOL)
	{
		// Since we allow the data to be passes as a string, a simple array
		// or a multidimensional one, we need to do a little prepping.
		if ( ! is_array($name))
		{
			$name = [['name' => $name, 'content' => $content, 'type' => $type, 'newline' => $newline]];
		}
		elseif (isset($name['name']))
		{
			// Turn single array into multidimensional
			$name = [$name];
		}

		$str = '';
				
		foreach ($name as $meta)
		{
			$type	 = (isset($meta['type']) && $meta['type'] !== 'name') ? 'http-equiv' 	 : 'name';
			$name	 = isset($meta['name'])								  ? $meta['name']    : '';
			$content = isset($meta['content'])							  ? $meta['content'] : '';
			$newline = isset($meta['newline'])							  ? $meta['newline'] : PHP_EOL;

			$str .= '<meta '.$type.'="'.$name.'" content="'.$content.'" />'.$newline;
		}

		return $str;
	}
}

//--------------------------------------------------------------------
// Initialize | Doctype tag.
//--------------------------------------------------------------------
echo doctype((Generate::$html['doctype'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['doctype'])).PHP_EOL;

//--------------------------------------------------------------------
// Open | Html tag.
//--------------------------------------------------------------------
echo '<html lang="'.(Generate::$html['lang'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['lang']).'">'.PHP_EOL;

//--------------------------------------------------------------------
// Open | Head tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'<head>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Meta Charset tag.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Charset ' .(Generate::$html['charset'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['charset']). ' -->'.PHP_EOL;
echo str_pad(' ', 2).'<meta charset="' .(Generate::$html['charset'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['charset']). '">'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Meta tag.
//--------------------------------------------------------------------
$metaConfig = array_merge(config('\BHPGenerator\Config\BHP')->metaConfig, (Generate::$meta));
if (! empty($metaConfig))
{
	echo str_pad(' ', 2).'<!-- Required meta tags -->'.PHP_EOL;
	foreach ($metaConfig as $metaName => $metaValue)
	{
		echo str_pad(' ', 2).meta($metaName, $metaValue);
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Favicon.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Favicon.ico -->'.PHP_EOL;
echo str_pad(' ', 2).link_tag(base_url('favicon.ico'), 'icon', 'image/ico').PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | External CSS.
//--------------------------------------------------------------------
if (! empty($options['external_css']) && Generate::$assetsReConfig == false)
{
	for ($i=0; $i < count($options['external_css']) ; $i++)
	{
		echo str_pad(' ', 2).link_tag($options['external_css'][$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

if (! empty(Generate::$assetsHeader['external_css']))
{
	for ($i=0; $i < count(Generate::$assetsHeader['external_css']) ; $i++)
	{
		echo str_pad(' ', 2).link_tag(Generate::$assetsHeader['external_css'][$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Directed CSS.
//--------------------------------------------------------------------
if (! empty($options['directed_css']) && Generate::$assetsReConfig == false)
{
	echo str_pad(' ', 2).'<style type="text/css">'.$options['directed_css'].'</style>'.PHP_EOL.PHP_EOL;
}

if (! empty(Generate::$assetsHeader['directed_css']))
{
	echo str_pad(' ', 2).'<style type="text/css">'.Generate::$assetsHeader['directed_css'].'</style>'.PHP_EOL.PHP_EOL;
}

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

if (! empty(Generate::$assetsHeader['external_js']))
{
	for ($i=0; $i < count(Generate::$assetsHeader['external_js']) ; $i++)
	{
		echo str_pad(' ', 2).script_tag(Generate::$assetsHeader['external_js'][$i]).PHP_EOL;
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


if (! empty(Generate::$assetsHeader['directed_js']))
{
	echo str_pad(' ', 2).'<script type="text/javascript">'.Generate::$assetsHeader['directed_js'].'</script>'.PHP_EOL.PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize Pre-Load CSS.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Pre-Load Screen CSS -->'.PHP_EOL;
echo str_pad(' ', 2).'<style type="text/css"> .preloader {position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: #fff; } .loading {position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%); font: 14px arial; } </style>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Title tag.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Title -->'.PHP_EOL;
echo str_pad(' ', 2).'<title>'.(Generate::$html['title'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['title']).'</title>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Close | Head tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'</head>'.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Body attr
//--------------------------------------------------------------------
echo str_pad(' ', 1).'<body'.stringify_attributes(array_merge(config('\BHPGenerator\Config\BHP')->bodyConfig, Generate::$body)).'>';

echo PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Everything is done, now load content.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Pre-Load Screen START -->'.PHP_EOL;
echo str_pad(' ', 2).'<div class="preloader"> <div class="loading"> <img src="https://cdn.jsdelivr.net/gh/astoart/ui/astoart.com/img/loading.gif" width="86"> <p style="font-size: 1.0rem">Please Wait</p> </div> </div>'.PHP_EOL;
echo str_pad(' ', 2).'<!-- Pre-Load Screen END -->'.PHP_EOL.PHP_EOL; 

//--------------------------------------------------------------------
// Reset options val
//--------------------------------------------------------------------
