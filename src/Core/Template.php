<?php namespace BHPGenerator\Core;

class Template
{

	/**
	 *
	 */
	public static function header(array $assets = [])
	{
		return view('\BHPGenerator\Views\header', [], $assets);
	}

	/**
	 *
	 */
	public static function footer(array $assets = [])
	{
		return view('\BHPGenerator\Views\footer', [], $assets);
	}

}