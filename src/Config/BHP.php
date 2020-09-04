<?php namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class BHP extends BaseConfig
{

	/**
	 * HTML Configuration
	 *
	 */
	public $htmlConfig =
	[
		'doctype' => 'html5', // default of bootstrap 4
		'charset' => 'utf-8', // default of bootstrap 4
		'lang'    => 'en',
		'title'   => 'Your Website Title'
	];

	/**
	 * META Configuration
	 *
	 * You can add more meta config, because it's array
	 * and generate automatically with loop.
	 *
	 */
	public $metaConfig =
	[
		'description' => '',
		'keywords'    => '',
		'author'      => '',
		'viewport'    => 'width=device-width, initial-scale=1, shrink-to-fit=no', // default of bootstrap 4
	];

	/**
	 * If you want add extra attr in <body ...> write it here
	 * And this is loop too
	 *
	 * Example : add body class <body class="css">
	 *
	 * $bodyConfig = ['class' => 'css'];
	 *
	 */
	public $bodyConfig = [];

}