<?php

namespace BHPGenerator\Core;

use BHPGenerator\Core\Blade\BladeOne;

class View
{

    // Creating default view (basic)
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
        $view = '';

        if (strpos($name, '::'))
        {
            $explode = explode('::', $name);

            for ($i=0; $i <= substr_count($name, '::'); $i++)
            { 
                $view .= view($explode[$i], $data, $optional);
            }
        }

        return empty($view) ? view($name, $data, $optional) : $view;
    }

    // Creating parser view (basic)
	public static function parser(string $name = '', array $data = [], array $optional = [])
    {
    	$parser = single_service('parser');
        $view   = '';

        if (strpos($name, '::'))
        {
            $explode = explode('::', $name);

            for ($i=0; $i <= substr_count($name, '::'); $i++)
            { 
                $view .= $parser->setData($data)->render($explode[$i], $optional);
            }
        }

        return empty($view) ? $parser->setData($data)->render($name, $optional) : $view;
    }

    // Creating blade view (basic)
    public static function blade(string $name = '', array $data = [])
    {
        $blade = new BladeOne(config('Paths')->viewDirectory, config('Cache')->storePath);
        $view   = '';

        if (strpos($name, '::'))
        {
            $explode = explode('::', $name);

            for ($i=0; $i <= substr_count($name, '::'); $i++)
            { 
                $view .= $blade->run($explode[$i], $data);
            }
        }

        return empty($view) ? $blade->run($name, $data) : $view;
    }

}