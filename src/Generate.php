<?php

namespace BHPGenerator;

use BHPGenerator\Core\View;
use BHPGenerator\Core\Header;
use BHPGenerator\Core\Footer;

class Generate
{

	/**
	 * Object of Assets Name
	 *
	 * @var array
	 */
	public static $css_js = [];

	/**
	 * Object of Asset Name
	 *
	 * @var string
	 */
	protected static $asset = 'default';
	
	/**
	 * Object of HTML name
	 *
	 * @var array
	 */
    protected static $html = [];

    /**
	 * Object of Body name
	 *
	 * @var array
	 */
    protected static $body = [];

    /**
	 * Object of Meta name
	 *
	 * @var array
	 */
    protected static $meta = [];

	/**
	 * --------------------------------------------------------------------------
	 * Constructor
	 * --------------------------------------------------------------------------
	 *
	 * We need to use constructor for super object.
	 *
	 * @var mix
	 */
	protected function __construct(string $config = '', array $html = [], array $body = [], array $meta = [])
	{
		self::$asset = empty($config) ? self::$asset : $config;
		self::$html  = $html;
		self::$body  = $body;
		self::$meta  = $meta;

		self::$css_js = array_merge(self::$css_js, ['replace' => false]);
	}

	/**
	 * --------------------------------------------------------------------------
	 * Initialize
	 * --------------------------------------------------------------------------
	 *
	 * Initialize super object is used to set again the asset name.
	 *
	 * @var string
	 */
	public static function initialize(string $config = '')
    {
        return new Generate($config);
    }

    /**
	 * --------------------------------------------------------------------------
	 * Html
	 * --------------------------------------------------------------------------
	 *
	 * Use html(array) object if you want to reset the Config\Html.php
	 * Here is the available configuration :
	 * 
	 * ->html(['language' => '', 'title' => ''])->
	 *
	 * I think favicon, doctype and charset doesn't need to change.
	 *
	 * @var array
	 */
    public static function html(array $config = [])
    {
    	return new Generate(self::$asset, $config, self::$body, self::$meta);
    }

    /**
	 * --------------------------------------------------------------------------
	 * Body
	 * --------------------------------------------------------------------------
	 *
	 * Use body(array) object if you want to reset the Config\Body.php - Attributes
	 * Here is the available configuration :
	 * 
	 * ->body([])->
	 *
	 * I think cookieBannerURI & preload doesn't need to change.
	 *
	 * @var array
	 */
    public static function body(array $config = [])
    {
    	return new Generate(self::$asset, self::$html, $config, self::$meta);
    }

    /**
	 * --------------------------------------------------------------------------
	 * Meta
	 * --------------------------------------------------------------------------
	 *
	 * Use meta(array) object if you want to reset the Config\Meta.php
	 * Here is the available configuration :
	 * 
	 * ->meta([])->
	 *
	 * You can change all the meta.
	 *
	 * @var array
	 */
    public static function meta(array $config = [])
    {
    	return new Generate(self::$asset, self::$html, self::$body, $config);
    }

	/**
	 * --------------------------------------------------------------------------
	 * Render The View
	 * --------------------------------------------------------------------------
	 *
	 * We need to render the view before return it to the controller.
	 *
	 * @var string, string, array, array
	 */
	protected static function __(string $view = '', string $name = '', array $data = [], array $optional = [])
	{
		$ui  = Header::generate(self::$asset, self::$html, self::$body, self::$meta);
		$ui .= View::$view($name, $data, $optional);
		$ui .= Footer::generate(self::$asset);

		return $ui;
		       
	}

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
		return self::__('default', $name, $data, $optional);
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
		return self::__('parser', $name, $data, $optional);
	}

}