<?php

namespace BHPGenerator;

use BHPGenerator\Core\View;
use BHPGenerator\Core\Header;
use BHPGenerator\Core\Footer;

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
		return Header::generate() . View::default($name, $data, $optional) . Footer::generate();
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
		return Header::generate() . View::parser($name, $data, $optional) . Footer::generate();
	}

}