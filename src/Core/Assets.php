<?php namespace BHPGenerator\Core;

class Assets
{

	/**
	 *
	 */
	public static function header()
	{
		$initialize = \BHPGenerator\Generate::$asset;
		return config('\BHPGenerator\Config\Assets')->$initialize['HEADER'];
	}

	/**
	 *
	 */
	public static function footer()
	{
		$initialize = \BHPGenerator\Generate::$asset;
		return config('\BHPGenerator\Config\Assets')->$initialize['FOOTER'];
	}

}