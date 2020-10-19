<?php namespace BHPGenerator;

use BHPGenerator\Core\Assets;
use BHPGenerator\Core\Template;
use BHPGenerator\Core\Tools;

class Generate
{

    /**
     * return Generate::BHP_VERSION;
     *
     */
    const BHP_VERSION = '2.7';

    //--------------------------------------------------------------------

    /**
     *
     *
     */
    public static $asset = 'default';

    //--------------------------------------------------------------------

    /**
     * reConfig BHP.php
     *
     */
    public static $html = [];
    public static $meta = [];
    public static $body = [];

    //--------------------------------------------------------------------

    /**
     * reConfig Assets.php
     *
     */
    public static $assetsHeader   = [];
    public static $assetsFooter   = [];
    public static $assetsReConfig = false;

    //--------------------------------------------------------------------

    /**
     * Construct
     *
     */
    public function __construct(string $asset = 'default', array $html = [], array $meta = [], array $body = [])
    {
        Generate::$asset = $asset;

        Generate::$html = $html;
        Generate::$meta = $meta;
        Generate::$body = $body;
    }

    //--------------------------------------------------------------------

    /**
     *
     *
     */
    public static function initialize(string $config = 'default')
    {
        return new Generate($config);
    }

    //--------------------------------------------------------------------

    /**
     * html for re-config
     * re-config and or add config for meta and body
     *
     */
    public static function html(array $config = [])
    {
        return new Generate(self::$asset, $config, self::$meta, self::$body);
    }

    public static function meta(array $config = [])
    {
        return new Generate(self::$asset, self::$html, $config, self::$body);
    }

    public static function body(array $config = [])
    {
        return new Generate(self::$asset, self::$html, self::$meta, $config);
    }

    //--------------------------------------------------------------------

    /**
     * return Generate::default($name, $data, $optional);
     *
     */
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
        return Template::header(Assets::header()) .
               Tools::default($name, $data, $optional) .
               Template::footer(Assets::footer());
    }

    /**
     * return Generate::combine($name, $data, $optional) | $name = 'part/header::view_name::part/footer'
     *
     */
    public static function combine(string $name = '', array $data = [], array $optional = [])
    {
        return Template::header(Assets::header()) .
               Tools::combine($name, $data, $optional) .
               Template::footer(Assets::footer());
    }

    //--------------------------------------------------------------------

}
