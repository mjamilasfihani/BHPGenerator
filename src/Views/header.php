<?php

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
echo doctype(($options['htmlConfig']['doctype'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['doctype'])).PHP_EOL;

//--------------------------------------------------------------------
// Open | Html tag.
//--------------------------------------------------------------------
echo '<html lang="'.($options['htmlConfig']['lang'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['lang']).'">'.PHP_EOL;

//--------------------------------------------------------------------
// Open | Head tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'<head>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Meta Charset tag.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Charset ' .($options['htmlConfig']['charset'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['charset']). ' -->'.PHP_EOL;
echo str_pad(' ', 2).'<meta charset="' .($options['htmlConfig']['charset'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['charset']). '">'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Meta tag.
//--------------------------------------------------------------------
$metaConfig = array_merge(config('\BHPGenerator\Config\BHP')->metaConfig, ($options['metaConfig'] ?? []));
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
if (! empty($options['external_css']))
{
	echo str_pad(' ', 2).'<!-- Load external CSS -->'.PHP_EOL;
	for ($i=0; $i < count($options['external_css']) ; $i++)
	{
		echo str_pad(' ', 2).link_tag($options['external_css'][$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Directed CSS.
//--------------------------------------------------------------------
if (! empty($options['directed_css']))
{
	echo str_pad(' ', 2).'<!-- Load directed CSS -->'.PHP_EOL;
	echo str_pad(' ', 2).'<style type="text/css">'.$options['directed_css'].'</style>'.PHP_EOL.PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | External JS.
//--------------------------------------------------------------------
if (! empty($options['external_js']))
{
	echo str_pad(' ', 2).'<!-- Load external JS  -->'.PHP_EOL;
	for ($i=0; $i < count($options['external_js']) ; $i++)
	{
		echo str_pad(' ', 2).script_tag($options['external_js'][$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Directed JS.
//--------------------------------------------------------------------
if (! empty($options['directed_js']))
{
	echo str_pad(' ', 2).'<!-- Load directed JS -->'.PHP_EOL;
	echo str_pad(' ', 2).'<script type="text/javascript">'.$options['directed_js'].'</script>'.PHP_EOL.PHP_EOL;
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
echo str_pad(' ', 2).'<title>'.($options['htmlConfig']['title'] ?? config('\BHPGenerator\Config\BHP')->htmlConfig['title']).'</title>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Close | Head tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'</head>'.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Body attr
//--------------------------------------------------------------------
echo str_pad(' ', 1).'<body'.stringify_attributes(array_merge(config('\BHPGenerator\Config\BHP')->bodyConfig, ($options['bodyConfig'] ?? []))).'>';

echo PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Everything is done, now load content.
//--------------------------------------------------------------------

echo str_pad(' ', 2).'<!-- Pre-Load Screen START -->'.PHP_EOL;
echo str_pad(' ', 2).'<div class="preloader"> <div class="loading"> <img src="https://cdn.jsdelivr.net/gh/astoart/ui/astoart.com/img/loading.gif" width="86"> <p style="font-size: 1.0rem">Please Wait</p> </div> </div>'.PHP_EOL;
echo str_pad(' ', 2).'<!-- Pre-Load Screen END -->'.PHP_EOL.PHP_EOL; 
