<?php namespace BHPGenerator\Core;

class Filters
{

	/**
	 * Filter BHPConfig, so it only used in header.php and footer.php
	 *
	 */
	public static function optional(array $options = [])
	{
		$options['BHPConfig']['htmlConfig']  = [];
		$options['BHPConfig']['metaConfig']  = [];
		$options['BHPConfig']['bodyConfig']  = [];
		$options['BHPConfig']['headerAsset'] = [];
		$options['BHPConfig']['footerAsset'] = [];

		return $options;
	}

}