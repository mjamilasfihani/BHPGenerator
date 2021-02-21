<?php

namespace BHPGenerator;

use BHPGenerator\Core\View as BHPView;

class Generate
{

	/**
	 * --------------------------------------------------------------------------
	 * Default
	 * --------------------------------------------------------------------------
	 *
	 * This static function is handle the default version of view.
	 *
	 * @var string, array, array
	 */
	public static function default(string $name = '', array $data = [], array $optional = [])
	{
		return BHPView::default($name, $data, $optional);
	}

	/**
	 * --------------------------------------------------------------------------
	 * Parser
	 * --------------------------------------------------------------------------
	 *
	 * This static function is handle parser version of view.
	 *
	 * @var string, array, array
	 */
	public static function parser(string $name = '', array $data = [], array $optional = [])
	{
		return BHPView::parser($name, $data, $optional);
	}
}