<?php

namespace BHPGenerator\Core;

class Header
{
	
	public static function generate(string $assetName = 'default')
	{
		// Initialize
		$assets = config('\BHPGenerator\Config\Assets')->$assetName['HEADER'];
		$body   = config('\BHPGenerator\Config\Body');
		$html   = config('\BHPGenerator\Config\Html');
		$meta   = config('\BHPGenerator\Config\Meta');

		//--------------------------------------------------------------------
		// Initialize | Doctype tag.
		//--------------------------------------------------------------------

		$str = doctype($html->doctype);

		//--------------------------------------------------------------------
		// Open | Html tag.
		//--------------------------------------------------------------------

		$str .= '<html lang="'.(empty($html->language) ? config('App')->defaultLocale : $html->language).'">';

		//--------------------------------------------------------------------
		// Open | Head tag.
		//--------------------------------------------------------------------

		$str .= '<head>';

		//--------------------------------------------------------------------
		// Initialize | Meta Charset tag.
		//--------------------------------------------------------------------

		$str .= '<meta charset="' .(empty($html->charset) ? config('App')->charset : $html->charset). '">';

		//--------------------------------------------------------------------
		// Initialize | Meta tag.
		//--------------------------------------------------------------------

		$attr = array_merge([
			'description' => $meta->description,
			'keywords'    => implode(', ', $meta->keywords),
			'author'      => $meta->author,
			'viewport'    => $meta->viewport], $meta->attributeName);

		if (! empty($attr))
		{
			foreach ($attr as $name => $value)
			{
				$str .= self::meta($name, $value);
			}
		}
		
		if (! empty($meta->attributeHttpEquiv))
		{
			foreach ($meta->attributeHttpEquiv as $name => $value)
			{
				$str .= self::meta($name, $value, 'http-equiv');
			}
		}

		if (! empty($meta->attributeProperty))
		{
			foreach ($meta->attributeProperty as $name => $value)
			{
				$str .= self::meta($name, $value, 'property');
			}
		}

		//--------------------------------------------------------------------
		// Initialize | Favicon.
		//--------------------------------------------------------------------

		if (empty($html->favicon))
		{
			$str .= link_tag(base_url('favicon.ico'), 'icon', 'image/ico');
		}
		else
		{
			$str .= link_tag($html->favicon, 'icon', mime_content_type($html->favicon));
		}

		//--------------------------------------------------------------------
		// Initialize | External CSS.
		//--------------------------------------------------------------------

		if (! empty($assets['external_css']))
		{
			for ($i=0; $i <count($assets['external_css']); $i++)
			{
				$str .= link_tag($assets['external_css'][$i]);
			}
		}

		//--------------------------------------------------------------------
		// Initialize | Directed CSS.
		//--------------------------------------------------------------------

		if (! empty($assets['directed_css']))
		{
			$str .= '<style type="text/css">'.$assets['directed_css'].'</style>';
		}

		//--------------------------------------------------------------------
		// Initialize | External JS.
		//--------------------------------------------------------------------

		if (! empty($assets['external_js']))
		{
			for ($i=0; $i < count($assets['external_js']) ; $i++)
			{
				$str .= script_tag($assets['external_js'][$i]);
			}
		}

		//--------------------------------------------------------------------
		// Initialize | Directed JS.
		//--------------------------------------------------------------------

		if (! empty($assets['directed_js']))
		{
			$str .= '<script type="text/javascript">'.$assets['directed_js'].'</script>';
		}

		//--------------------------------------------------------------------
		// Initialize Pre-Load CSS.
		//--------------------------------------------------------------------

		if ($body->preload)
		{
			$str .= link_tag('https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.css');
			$str .= script_tag('https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.js');
		}

		//--------------------------------------------------------------------
		// Initialize | Title tag.
		//--------------------------------------------------------------------

		$str .= '<title>'.$html->title.'</title>';

		//--------------------------------------------------------------------
		// Close | Head tag.
		//--------------------------------------------------------------------

		$str .= '</head>';

		//--------------------------------------------------------------------
		// Initialize | Body attr
		//--------------------------------------------------------------------

		$str .= '<body'.stringify_attributes($body->attributes).'>';

		//--------------------------------------------------------------------
		// Everything is done, now load content.
		//--------------------------------------------------------------------
		
		if ($body->preload)
		{
			$str .= '<div id="loader" class="ldld full"></div><script type="text/javascript">var ldld = new ldLoader({ root: "#loader" }); ldld.on();</script>';
		}

		return $str;
	}

	public static function meta(string $name = '', string $content = '', string $type = 'name')
	{
		// Since we allow the data to be passes as a string, a simple array
		// or a multidimensional one, we need to do a little prepping.
		if ( ! is_array($name))
		{
			$name = [['name' => $name, 'content' => $content, 'type' => $type]];
		}
		elseif (isset($name['name']))
		{
			// Turn single array into multidimensional
			$name = [$name];
		}

		$string = '';
						
		foreach ($name as $meta)
		{
			$type	 = isset($meta['type'])    ? $meta['type'] 	  : '';
			$name	 = isset($meta['name'])	   ? $meta['name']    : '';
			$content = isset($meta['content']) ? $meta['content'] : '';

			$string .= '<meta '.$type.'="'.$name.'" content="'.$content.'" />';
		}

		return $string;
	}
	
}