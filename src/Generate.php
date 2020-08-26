<?php namespace BHPGenerator;

use BHPGenerator\Assets;
use BHPGenerator\Tools\Template;
use BHPGenerator\Tools\Combine;

class Generate
{

    /**
     * return Generate::BHP_VERSION;
     *
     */
	const BHP_VERSION = '2.0';

    /**
     * return Generate::default($name, $data, $optional);
     *
     * Here is tutorial how to add more asset in spesific controller
     *
     * example : (This features under development)
     *
     * $data =
     * [
     *      '::header' =>
     *      [
     *          'external_css' => ['http://example.com/assets/app.css', 'more', 'and more'],
     *          'directed_css' => 'write your css here',
     *          'directed_js'  => 'write your js here'
     *      ],
     *      '::footer' =>
     *      [
     *          'directed_js' => 'write your js here'
     *      ]
     * ];
     * return Generate::default('your_view_name', $data);
     *
     */
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
        $header = Assets::assetHeader();
        $footer = Assets::assetFooter();

        if (! empty($data['::header']))
        {
            $header = array_merge($header, $data['::header']);
        }

        if (! empty($data['::footer']))
        {
            $footer = array_merge($footer, $data['::footer']);
        }

    	return Template::header($header) . view($name, $data, $optional) . Template::footer($footer);
    }

    /**
     * return Generate::combine($name, $data, $optional)
     *
     */
    public static function combine(string $name = '', array $data = [], array $optional = [])
    {
        $header = Assets::assetHeader();
        $footer = Assets::assetFooter();

        if (! empty($data['::header']))
        {
            $header = array_merge($header, $data['::header']);
        }

        if (! empty($data['::footer']))
        {
            $footer = array_merge($footer, $data['::footer']);
        }

        return Template::header($header) . Combine::view($name, $data, $optional) . Template::footer($footer);
    }

}