<?php

namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Body extends BaseConfig
{

	/**
	 * --------------------------------------------------------------------------
	 * Tag Body Attributes
	 * --------------------------------------------------------------------------
	 *
	 * If you have some body attributes, you can add your config here.
	 *
	 * Prototype
	 *
	 *   public $attributes = [
	 *   	  'class' => 'landing-page',
	 *		  'id'    => 'welcome'
	 *   ];
	 *
	 * @var array
	 */
	public $attributes = [];

	/**
	 * --------------------------------------------------------------------------
	 * Content Delivery Netowrk
	 * --------------------------------------------------------------------------
	 *
	 * All the assets is using CDN to load it, here I give the option :
	 *
	 *  - statically (default)
	 *  - jsdelivr
	 *
	 * This config only load the uri, so you must complete the parameter.
	 * EX : if you use statically, than BHPGenerator will load
	 * https://cdn.staticall.io/ so you must complete the asset based on
	 * your assets place.
	 *
	 * @var string
	 */
	public $cdn = 'statically';

	/**
	 * --------------------------------------------------------------------------
	 * PreLoad Page
	 * --------------------------------------------------------------------------
	 *
	 */
	public $preload = true;
	public $preloadIMG = '';
	public $preloadTEXT = '';

	/**
	 * --------------------------------------------------------------------------
	 * Cookie Powered by Cookie-Script.Com
	 * --------------------------------------------------------------------------
	 *
	 * If you need cookie banner than feel free to set a value at here.
	 * Remember that this config is different usecase from CI version.
	 *
	 * Parameter is https://cdn.cookie-script.com/s/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.js
	 * or just copy your js url and paste in here (because Cookie-Script has GEO features).
	 *
	 * If your website isn't have the quality to use cookie, leave it blank.
	 *
	 * @var string
	 */
	public $cookie = '';

}