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
	const BHP_VERSION = '2.1';

    /**
     * return Generate::default($name, $data, $optional);
     *
     */
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
    	return Template::header(Assets::header(), ($optional['BHPConfig'] ?? [])) .
               Tools::default($name, $data, $optional) .
               Template::footer(Assets::footer(), ($optional['BHPConfig'] ?? []));
    }

    /**
     * return Generate::combine($name, $data, $optional) | $name = 'part/header::view_name::part/footer'
     *
     */
    public static function combine(string $name = '', array $data = [], array $optional = [])
    {
        return Template::header(Assets::header(), ($optional['BHPConfig'] ?? [])) .
               Tools::combine($name, $data, $optional) .
               Template::footer(Assets::footer(), ($optional['BHPConfig'] ?? []));
    }

}