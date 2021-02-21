<?php

namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Body extends BaseConfig
{

	/**
	 * --------------------------------------------------------------------------
	 * Body Attributes
	 * --------------------------------------------------------------------------
	 *
	 * If you have some tag body attributes, you can add it here.
	 *
	 * Prototype
	 *
	 *   public $attributes = [
	 *   	  'class' => 'landing-page',
	 *		  'id'    => 'welcome'
	 *   ];
	 *
	 * It will be
	 *
	 *   <body class="landing-page" id="welcome">
	 *
	 * @var array
	 */
	public $attributes = [];

	/**
	 * --------------------------------------------------------------------------
	 * PreLoad Page
	 * --------------------------------------------------------------------------
	 *
	 * If you dont want use preloader screen, set to false. The default is true
	 *
	 * @var bool
	 */
	public $preload = true;

	/**
	 * --------------------------------------------------------------------------
	 * Cookie Banner
	 * --------------------------------------------------------------------------
	 *
	 * If you need a cookie banner, feel free to set a value at here.
	 * BHPGenerator's cookie banner is using Cookie-Script.Com (suggestion).
	 *
	 * Parameter is https://cdn.cookie-script.com/s/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.js
	 * or just copy your js url and paste in here (because Cookie-Script has GEO features).
	 *
	 * If your website isn't have the quality to use cookie, leave it blank.
	 *
	 * @var string
	 */
	public $cookieBannerURI = 'https://cdn.cookie-script.com/s/ccf9174af16192afee99b48079f2cd6c.js';

}