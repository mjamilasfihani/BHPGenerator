<?php namespace BHPGenerator\Core;

class Template
{

	/**
	 *
	 */
	public static function header(array $assets = [], array $config = [])
	{
		return view('\BHPGenerator\Views\header', [], array_merge($assets, $config));
	}

	/**
	 *
	 */
	public static function footer(array $assets = [], array $config = [])
	{
		return view('\BHPGenerator\Views\footer', [], array_merge($assets, $config));
	}

}