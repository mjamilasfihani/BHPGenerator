<?php

namespace BHPGenerator\Core;

class Header
{
	
	public static function generate()
	{
		// Meta function from CodeIgniter 3
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
				$type	 = (isset($meta['type']) && $meta['type'] !== 'name') ? $meta['type'] 	 : 'name';
				$name	 = isset($meta['name'])								  ? $meta['name']    : '';
				$content = isset($meta['content'])							  ? $meta['content'] : '';
				$newline = isset($meta['newline'])							  ? $meta['newline'] : PHP_EOL;

				$str .= '<meta '.$type.'="'.$name.'" content="'.$content.'" />'.$newline;
			}

			return $str;
		}

		// Initialize
		$body = config('\BHPGenerator\Config\Body');
		$html = config('\BHPGenerator\Config\Html');
		$meta = config('\BHPGenerator\Config\Meta');

		//--------------------------------------------------------------------
		// Initialize | Doctype tag.
		//--------------------------------------------------------------------

		$view = doctype($html->doctype).PHP_EOL;

		//--------------------------------------------------------------------
		// Open | Html tag.
		//--------------------------------------------------------------------

		$view .= '<html lang="'.(empty($html->language) ? config('App')->defaultLocale : $html->language).'">'.PHP_EOL;

		//--------------------------------------------------------------------
		// Open | Head tag.
		//--------------------------------------------------------------------

		$view .= str_pad(' ', 1).'<head>'.PHP_EOL.PHP_EOL;

		//--------------------------------------------------------------------
		// Initialize | Meta Charset tag.
		//--------------------------------------------------------------------

		$view .= str_pad(' ', 2).'<!-- Charset ' .(empty($html->charset) ? config('App')->charset : $html->charset). ' -->'.PHP_EOL;
		$view .= str_pad(' ', 2).'<meta charset="' .(empty($html->charset) ? config('App')->charset : $html->charset). '">'.PHP_EOL.PHP_EOL;

		//--------------------------------------------------------------------
		// Initialize | Meta tag.
		//--------------------------------------------------------------------

		$view .= str_pad(' ', 2).'<!-- Meta tags -->'.PHP_EOL;

		$attr = array_merge(['description' => $meta->description, 'keywords' => implode(', ', $meta->keywords), 'author' => $meta->author, 'viewport' => $meta->viewport], $meta->attributeName);

		if (! empty($attr))
		{
			foreach ($attr as $name => $value)
			{
				$view .= str_pad(' ', 2).meta($name, $value);
			}
		}

		
		if (! empty($meta->attributeHttpEquiv))
		{
			foreach ($meta->attributeHttpEquiv as $name => $value)
			{
				$view .= str_pad(' ', 2).meta($name, $value, 'http-equiv');
			}
		}

		if (! empty($meta->attributeProperty))
		{
			foreach ($meta->attributeProperty as $name => $value)
			{
				$view .= str_pad(' ', 2).meta($name, $value, 'property');
			}
		}

		$view .= PHP_EOL;

		//--------------------------------------------------------------------
		// Initialize | Favicon.
		//--------------------------------------------------------------------

		if (empty($html->favicon))
		{
			$view .= str_pad(' ', 2).'<!-- Favicon.ico -->'.PHP_EOL;
			$view .= str_pad(' ', 2).link_tag(base_url('favicon.ico'), 'icon', 'image/ico').PHP_EOL.PHP_EOL;
		}
		else
		{
			$view .= str_pad(' ', 2).'<!-- Favicon.ico -->'.PHP_EOL;
			$view .= str_pad(' ', 2).link_tag($html->favicon, 'icon', mime_content_type($html->favicon)).PHP_EOL.PHP_EOL;
		}

		//--------------------------------------------------------------------
		// Initialize | External CSS.
		//--------------------------------------------------------------------

		//--------------------------------------------------------------------
		// Initialize | Directed CSS.
		//--------------------------------------------------------------------

		//--------------------------------------------------------------------
		// Initialize | External JS.
		//--------------------------------------------------------------------

		//--------------------------------------------------------------------
		// Initialize | Directed JS.
		//--------------------------------------------------------------------

		//--------------------------------------------------------------------
		// Initialize Pre-Load CSS.
		//--------------------------------------------------------------------

		if ($body->preload)
		{
			$view .= str_pad(' ', 2).'<!-- Loading.Io CSS and JS -->'.PHP_EOL;
			$view .= str_pad(' ', 2).link_tag('https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.css').PHP_EOL;
			$view .= str_pad(' ', 2).script_tag('https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.js').PHP_EOL.PHP_EOL;
		}

		//--------------------------------------------------------------------
		// Initialize | Title tag.
		//--------------------------------------------------------------------

		$view .= str_pad(' ', 2).'<!-- Title -->'.PHP_EOL;
		$view .= str_pad(' ', 2).'<title>'.$html->title.'</title>'.PHP_EOL.PHP_EOL;

		//--------------------------------------------------------------------
		// Close | Head tag.
		//--------------------------------------------------------------------

		$view .= str_pad(' ', 1).'</head>'.PHP_EOL;

		//--------------------------------------------------------------------
		// Initialize | Body attr
		//--------------------------------------------------------------------

		$view .= str_pad(' ', 1).'<body'.stringify_attributes($body->attributes).'>'.PHP_EOL.PHP_EOL;

		//--------------------------------------------------------------------
		// Everything is done, now load content.
		//--------------------------------------------------------------------
		
		if ($body->preload)
		{
			$view .= str_pad(' ', 2).'<!-- Pre-Load Screen START -->'.PHP_EOL;
			$view .= str_pad(' ', 2).'<div id="loader" class="ldld full"></div><script type="text/javascript">var ldld = new ldLoader({ root: "#loader" }); ldld.on();</script>'.PHP_EOL;
			$view .= str_pad(' ', 2).'<!-- Pre-Load Screen END -->'.PHP_EOL.PHP_EOL;
		}

		return $view;
	}
	
}