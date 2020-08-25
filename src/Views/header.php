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
echo doctype(config('BHP')->html_config['doctype']).PHP_EOL;

//--------------------------------------------------------------------
// Open | Html tag.
//--------------------------------------------------------------------
echo '<html lang="'.config('BHP')->html_config['lang'].'">'.PHP_EOL;

//--------------------------------------------------------------------
// Open | Head tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'<head>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Meta tag.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Charset ' .config('BHP')->html_config['charset']. ' -->'.PHP_EOL;
echo str_pad(' ', 2).'<meta charset="' .config('BHP')->html_config['charset']. '">'.PHP_EOL.PHP_EOL;

echo str_pad(' ', 2).'<!-- Required meta tags -->'.PHP_EOL;
echo str_pad(' ', 2).meta('description' , config('BHP')->meta_config['description']);
echo str_pad(' ', 2).meta('keywords'    , config('BHP')->meta_config['keywords']);
echo str_pad(' ', 2).meta('author'      , config('BHP')->meta_config['author']);
echo str_pad(' ', 2).meta('viewport'    , config('BHP')->meta_config['viewport']).PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Favicon.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Favicon.ico -->'.PHP_EOL;
echo str_pad(' ', 2).link_tag(base_url('favicon.ico'), 'icon', 'image/ico').PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | External CSS.
//--------------------------------------------------------------------
if (! empty($external_css))
{
	echo str_pad(' ', 2).'<!-- Load external CSS -->'.PHP_EOL;
	for ($i=0; $i < count($external_css) ; $i++)
	{
		echo str_pad(' ', 2).link_tag($external_css[$i]).PHP_EOL;
	}
	echo PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize | Directed CSS.
//--------------------------------------------------------------------
if (! empty($directed_css))
{
	echo str_pad(' ', 2).'<!-- Load directed CSS -->'.PHP_EOL;
	echo str_pad(' ', 2).'<style type="text/css">'.$directed_css.'</style>'.PHP_EOL.PHP_EOL;
}

//--------------------------------------------------------------------
// Initialize Pre-Load CSS.
//--------------------------------------------------------------------

echo str_pad(' ', 2).'<!-- Pre-Load Screen CSS -->'.PHP_EOL;
echo str_pad(' ', 2).'<style type="text/css"> .preloader {position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: #fff; } .loading {position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%); font: 14px arial; } </style>'.PHP_EOL.PHP_EOL;

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
// Initialize | Title tag.
//--------------------------------------------------------------------
echo str_pad(' ', 2).'<!-- Title -->'.PHP_EOL;
echo str_pad(' ', 2).'<title>'.config('BHP')->html_config['title'].'</title>'.PHP_EOL.PHP_EOL;

//--------------------------------------------------------------------
// Close | Head tag.
//--------------------------------------------------------------------
echo str_pad(' ', 1).'</head>'.PHP_EOL;

//--------------------------------------------------------------------
// Initialize | Body class and id based on ENV also MyAssets.php
//--------------------------------------------------------------------
echo str_pad(' ', 1).'<body'.stringify_attributes(config('BHP')->body_config).'>';

//--------------------------------------------------------------------
// Initialize | Javascript must be enabled!!!
//--------------------------------------------------------------------
echo PHP_EOL.PHP_EOL;
echo str_pad(' ', 2).'<!-- Js checker -->'.PHP_EOL;

echo str_pad(' ', 2).'<noscript><div style="position: fixed; top: 0px; left: 0px; z-index: 3000; height: 100%; width: 100%; background-color: #FFFFFF"><noscript><div style="position: fixed; top: 0px; left: 0px; z-index: 3000; height: 100%; width: 100%; background-color: #FFFFFF"><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>NOTICE!</strong> Agar fungsi di situs ini lebih baik, anda perlu mengaktifkan JavaScript. Berikut ini adalah <a href="https://www.enable-javascript.com/id/"> petunjuk cara mengaktifkan JavaScript</a> di peramban web Anda.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div></noscript>'.PHP_EOL;

echo PHP_EOL;

//--------------------------------------------------------------------
// Everything is done, now load content.
//--------------------------------------------------------------------

echo str_pad(' ', 2).'<!-- Pre-Load Screen START -->'.PHP_EOL;
echo str_pad(' ', 2).'<div class="preloader"> <div class="loading"> <img src="https://cdn.jsdelivr.net/gh/astoart/ui/astoart.com/img/loading.gif" width="86"> <p style="font-size: 1.0rem">Please Wait</p> </div> </div>'.PHP_EOL;
echo str_pad(' ', 2).'<!-- Pre-Load Screen END -->'.PHP_EOL.PHP_EOL; 
