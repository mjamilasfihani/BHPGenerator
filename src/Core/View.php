<?php

namespace BHPGenerator\Core;

class View
{

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

}