<?php namespace BHPGenerator;

use BHPGenerator\Assets\Template;
use BHPGenerator\Assets\Combine;

class Generate
{

    /**
     * return Generate::BHP_VERSION;
     *
     */
	const BHP_VERSION = '2.0';

    //----------------------------------------------------------------------------------

    /**
     * Header asset
     *
     */
    public static function assetHeader()
    {
        return
        [
            'external_css' =>
            [
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fonts/google.css',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/css/shards.css'
            ],
            'directed_css' => '',

            'external_js' => 
            [
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/jquery.js',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/popper.js',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/bootstrap.js'
            ],
            'directed_js' => ''
        ];
    }

    /**
     * Footer asset
     *
     */
    public static function assetFooter()
    {
        return
        [
            'external_js' =>
            [
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js'
            ],
            'directed_js' => ''
        ];
    }

    //----------------------------------------------------------------------------------

    /**
     * return Generate::default($name, $data, $optional);
     *
     */
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
        $header = \BHPGenerator\Generate::assetHeader();
        $footer = \BHPGenerator\Generate::assetFooter();

    	return Template::header($header) .
               Combine::view($name, $data, $optional) .
               Template::footer($footer);
    }

}