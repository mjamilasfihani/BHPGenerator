<?php namespace BHPGenerator\Core;

class Template
{

	/**
	 *
	 */
	public static function header(array $assets = [], array $bhp_config = [])
	{
		if (empty($bhp_config['assetReplace']))
		{
			$bhp_config['assetReplace'] = false;
		}

		return view('\BHPGenerator\Views\header', [], array_merge($assets, $bhp_config));
	}

	/**
	 *
	 */
	public static function footer(array $assets = [], array $bhp_config = [])
	{
		if (empty($bhp_config['assetReplace']))
		{
			$bhp_config['assetReplace'] = false;
		}

		return view('\BHPGenerator\Views\footer', [], array_merge($assets, $bhp_config));
	}

}