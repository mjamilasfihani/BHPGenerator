<?php

namespace BHPGenerator\Core;

class Footer
{
	
	public static function generate(string $assetName = 'default')
	{
		// Initialize
		$assets = config('\BHPGenerator\Config\Assets')->$assetName['FOOTER'];
		$body   = config('\BHPGenerator\Config\Body');

		//--------------------------------------------------------------------
		// Initialize | External JS.
		//--------------------------------------------------------------------

		if (! empty($assets['external_js']))
		{
			for ($i=0; $i < count($assets['external_js']); $i++)
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