<?php namespace BHPGenerator\Assets;

class Template
{

	/**
	 *
	 */
	public static function header(array $asset = [])
	{
		return view('BHPGenerator\Views\header', $asset);
	}

	/**
	 *
	 */
	public static function footer(array $asset = [])
	{
		return view('BHPGenerator\Views\footer', $asset);
	}

}