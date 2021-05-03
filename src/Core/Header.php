<?php

namespace BHPGenerator\Core;

use BHPGenerator\Generate;

class Header
{
	
	public static function generate(string $asset = 'default', array $_html = [], array $_body = [], array $_meta = [], array $_metaHttpEquiv = [], array $_metaProperty = [])
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

		$body = config('\BHPGenerator\Config\Body');
		$html = config('\BHPGenerator\Config\Html');
		$meta = config('\BHPGenerator\Config\Meta');

		//--------------------------------------------------------------------
		// Initialize | Doctype tag.
		//--------------------------------------------------------------------

		$str = doctype($html->doctype);

		//--------------------------------------------------------------------
		// Open | Html tag.
		//--------------------------------------------------------------------

		$str .= '<html lang="'.($_html['language'] ?? (empty($html->language) ? config('App')->defaultLocale : $html->language)).'">';

		//--------------------------------------------------------------------
		// Open | Head tag.
		//--------------------------------------------------------------------

		$str .= '<head>';

		//--------------------------------------------------------------------
		// Initialize | Meta Charset tag.
		//--------------------------------------------------------------------

		$str .= '<meta charset="'.(empty($html->charset) ? config('App')->charset : $html->charset).'">';

		//--------------------------------------------------------------------
		// Initialize | Meta tag.
		//--------------------------------------------------------------------

		# Merge meta with 'name' attribute
		$metaAttributeName = array_merge([
			'description' => $meta->description,
			'keywords'    => implode(', ', $meta->keywords),
			'author'      => $meta->author,
			'viewport'    => $meta->viewport
		], self::cleaner($meta->attributeName), $_meta);

		# Meta with name attribute
		if (! empty($metaAttributeName))
		{
			foreach ($metaAttributeName as $name => $value)
			{
				$str .= self::meta($name, $value, 'name');
			}
		}
		
		# Merge meta with 'http-equiv' attribute
		$metaAttributeHttpEquiv = array_merge($meta->attributeHttpEquiv, $_metaHttpEquiv);

		# Meta with http-equiv attribute
		if (! empty($metaAttributeHttpEquiv))
		{
			foreach ($metaAttributeHttpEquiv as $name => $value)
			{
				$str .= self::meta($name, $value, 'http-equiv');
			}
		}

		# Merge meta with 'property' attribute
		$metaProperty = array_merge($meta->attributeProperty, $_metaProperty);

		# Meta with property attribute
		if (! empty($metaProperty))
		{
			foreach ($metaProperty as $name => $value)
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
			for ($i=0; $i < count($assets['HEADER::external_css']); $i++)
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

		$str .= '<title>'.($_html['title'] ?? $html->title).'</title>';

		//--------------------------------------------------------------------
		// Close | Head tag.
		//--------------------------------------------------------------------

		$str .= '</head>';

		//--------------------------------------------------------------------
		// Initialize | Body attr
		//--------------------------------------------------------------------

		$str .= '<body'.stringify_attributes(array_merge($body->attributes, $_body)).'>';

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

	// Meta cleaner for 'name' attribute.
	protected static function cleaner(array $attributeName = [])
	{
		$attributeName = [];

		if (array_key_exists('description', $attributeName))
		{
			$attributeName = array_merge($attributeName, ['description' => '']);
		}

		if (array_key_exists('keywords', $attributeName))
		{
			$attributeName = array_merge($attributeName, ['keywords' => '']);
		}

		if (array_key_exists('author', $attributeName))
		{
			$attributeName = array_merge($attributeName, ['author' => '']);
		}

		if (array_key_exists('viewport', $attributeName))
		{
			$attributeName = array_merge($attributeName, ['viewport' => '']);
		}
		
		return $attributeName;
	}
	
}