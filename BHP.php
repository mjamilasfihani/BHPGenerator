<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class BHP extends BaseConfig
{

	/**
	 *
	 */
	public $html_config =
	[
		'doctype' => 'html5', // default of bootstrap 4
		'charset' => 'utf-8', // default of bootstrap 4
		'lang'    => 'en',
		'title'   => 'Your Website Title'
	];

	/**
	 *
	 */
	public $meta_config =
	[
		'description' => '',
		'keywords'    => '',
		'author'      => '',
		'viewport'    => 'width=device-width, initial-scale=1, shrink-to-fit=no', // default of bootstrap 4
	];

	/**
	 *
	 */
	public $body_config = [];

}