<?php namespace BHPGenerator;

use BHPGenerator\Assets\Template;

class Generate
{
    /**
     * echo Generate::BHP_VERSION;
     *
     */
	const BHP_VERSION = '1.1';

    /**
     * echo Generate::default($name, $data, $optional);
     *
     */
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
    	$header =
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

    	$footer =
    	[
    		'external_js' =>
    		[
    			'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js',
    			'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js'
    		],
    		'directed_js' => ''
    	];

        if (strpos($name, '::') && substr_count($name, '::') == 2)
        {
            $i = explode('::', $name);
            $view = view($i[0], $data, $optional) .
                    view($i[1], $data, $optional) .
                    view($i[2], $data, $optional);
        }
        else
        {
            $view = view($name, $data, $optional);
        }

    	return Template::header($header) . view($name, $data, $optional) . Template::footer($footer);
    }
}