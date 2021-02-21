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
	 * PreLoad Page Image Loading
	 * --------------------------------------------------------------------------
	 *
	 * If you have your own loading image, set this value. Otherwise leave it
	 * empty for the default image.
	 *
	 * NOTE : Your image width and lenght must be 120px
	 *
	 * @var string
	 */
	public $preloadImageLoading = '';

	/**
	 * --------------------------------------------------------------------------
	 * PreLoad Page Text Title
	 * --------------------------------------------------------------------------
	 *
	 * Preload screen text title, leave it blank it will use the default variable,
	 * the default is 'Please Wait'.
	 *
	 * @var string
	 */
	public $preloadText = '';

	/**
	 * --------------------------------------------------------------------------
	 * Cookie Banner
	 * --------------------------------------------------------------------------
	 *
	 * If you need a cookie banner, feel free to set a value at here.
	 * BHPGenerator's cookie banner is using Cookie-Script.Com 
	 *
	 * Parameter is https://cdn.cookie-script.com/s/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.js
	 * or just copy your js url and paste in here (because Cookie-Script has GEO features).
	 *
	 * If your website isn't have the quality to use cookie, leave it blank.
	 *
	 * @var string
	 */
	public $cookieBannerURI = '';

}