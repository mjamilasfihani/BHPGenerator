<?php

namespace BHPGenerator\Core;

use BHPGenerator\Generate;

class Footer
{
	
	public static function generate(string $asset = 'default')
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

		//--------------------------------------------------------------------
		// Initialize | External JS.
		//--------------------------------------------------------------------

		$str = '';

		if (! empty($assets['FOOTER::external_js']))
		{
			for ($i=0; $i < count($assets['FOOTER::external_js']); $i++)
			{
				$str .= script_tag($assets['FOOTER::external_js'][$i]);
			}
		}

		//--------------------------------------------------------------------
		// Initialize | Directed JS.
		//--------------------------------------------------------------------

		if (! empty($assets['FOOTER::directed_js']))
		{
			$str .= '<script type="text/javascript">'.$assets['FOOTER::directed_js'].'</script>';
		}

		//--------------------------------------------------------------------
		// Initialize | Cookie JS.
		//--------------------------------------------------------------------

		if (empty($body->cookieBannerURI) === false)
		{
			$str .= '<script type="text/javascript" src="'.$body->cookieBannerURI.'"></script>';
		}

		//--------------------------------------------------------------------
		// Initialize Pre-Load JS.
		//--------------------------------------------------------------------

		if ($body->preload)
		{
			$str .= '<script type="text/javascript">ldld.off()</script>';
		}

		//--------------------------------------------------------------------
		// Close | Body tag.
		//--------------------------------------------------------------------

		$str .= '</body>';

		//--------------------------------------------------------------------
		// Close | Html tag.
		//--------------------------------------------------------------------
		
		$str .= '</html>';

		return $str;
	}
	
}