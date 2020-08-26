<?php namespace Config;

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
	 *
	 */
	public $bodyConfig = [];

	/**
	 * Why you need this __construct() function?
	 *
	 * If you have goal like this :
	 *
	 *  current_url() === 'http://example.com' and the $htmlConfig['title'] = 'Title'
	 *  current_url() === 'http://example.com/page' and the $htmlConfig['title'] = 'Title - Extra text'
	 *
	 * Then just doing array_merge($this->htmlConfig, $data) | But $data is array.
	 * Here I give the example :
	 *
	 * if (current_url() === 'http://example.com')
	 * {
	 *		// your title for example.com will be Title
	 * 		$this->htmlConfig = array_merge($this->htmlConfig, ['title' => 'Title']);
	 * }
	 * elseif (current_url() === 'http://example.com/page')
	 * {
	 *		// your title for example.com/page will be Title - Extra text
	 *		$this->htmlConfig = array_merge($this->htmlConfig, ['title' => 'Title - Extra text']);
	 * }
	 *
	 * NOTE : Wanna add more css and js while in spesific controller? Hold up, it is under development.
	 *
	 */
	public function __construct()
	{

	}

}