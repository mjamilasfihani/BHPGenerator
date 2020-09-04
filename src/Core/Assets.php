<?php namespace BHPGenerator\Core;

class Assets
{

	/**
	 *
	 */
	public static function header()
	{
		return config('\BHPGenerator\Config\Assets')->assetHeader;
	}

	/**
	 *
	 */
	public static function footer()
	{
		return config('\BHPGenerator\Config\Assets')->assetFooter;
	}

}