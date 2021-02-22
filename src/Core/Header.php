<?php

namespace BHPGenerator\Core;

use BHPGenerator\Generate;

class Header
{
	
	public static function generate(string $asset = 'default', array $html_ = [], array $body_ = [], array $meta_ = [])
	{
		// Initialize
		if (isset(Generate::$css_js['replace']))
		{
			$assets = Generate::$css_js;
		}
		else
		{
			$assets = array_merge(config('\BHPGenerator\Config\Assets')->$asset, Generate::$css_js);
		}

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

		$str .= '<html lang="'.($html_['language'] ?? (empty($html->language) ? config('App')->defaultLocale : $html->language)).'">';

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

		$meta_ = array_merge($meta_, ['keywords' => implode(', ', $meta_['keywords'] ?? [])]);

		$attr = array_merge([
			'description' => $meta_['description'] ?? $meta->description,
			'keywords'    => $meta_['keywords']    ?? implode(', ', $meta->keywords),
			'author'      => $meta_['author']      ?? $meta->author,
			'viewport'    => $meta_['viewport']    ?? $meta->viewport], $meta->attributeName, $meta_);

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

		if (! empty($assets['HEADER::external_css']))
		{
			for ($i=0; $i <count($assets['HEADER::external_css']); $i++)
			{
				$str .= link_tag($assets['HEADER::external_css'][$i]);
			}
		}

		//--------------------------------------------------------------------
		// Initialize | Directed CSS.
		//--------------------------------------------------------------------

		if (! empty($assets['HEADER::directed_css']))
		{
			$str .= '<style type="text/css">'.$assets['HEADER::directed_css'].'</style>';
		}

		//--------------------------------------------------------------------
		// Initialize | External JS.
		//--------------------------------------------------------------------

		if (! empty($assets['HEADER::external_js']))
		{
			for ($i=0; $i < count($assets['HEADER::external_js']) ; $i++)
			{
				$str .= script_tag($assets['HEADER::external_js'][$i]);
			}
		}

		//--------------------------------------------------------------------
		// Initialize | Directed JS.
		//--------------------------------------------------------------------

		if (! empty($assets['HEADER::directed_js']))
		{
			$str .= '<script type="text/javascript">'.$assets['HEADER::directed_js'].'</script>';
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

		$str .= '<title>'.($html_['title'] ?? $html->title).'</title>';

		//--------------------------------------------------------------------
		// Close | Head tag.
		//--------------------------------------------------------------------

		$str .= '</head>';

		//--------------------------------------------------------------------
		// Initialize | Body attr
		//--------------------------------------------------------------------

		$str .= '<body'.stringify_attributes(array_merge($body->attributes, $body_)).'>';

		//--------------------------------------------------------------------
		// Everything is done, now load content.
		//--------------------------------------------------------------------
		
		if ($body->preload)
		{
			$str .= '<div id="loader" class="ldld full"></div><script type="text/javascript">var ldld = new ldLoader({ root: "#loader" }); ldld.on();</script>';
		}

		return $str;
	}

	// I took the meta helper in CI 3 with my own modification.
	protected static function meta(string $name = '', string $content = '', string $type = 'name')
	{
		$str = '';
						
		foreach ([['name' => $name, 'content' => $content, 'type' => $type]] as $val)
		{
			$type	 = empty($val['type'])    ? '' : $val['type'];
			$name	 = empty($val['name'])    ? '' : $val['name'];
			$content = empty($val['content']) ? '' : $val['content'];

			$str .= '<meta '.$type.'="'.$name.'" content="'.$content.'" />';
		}

		return $str;
	}
	
}