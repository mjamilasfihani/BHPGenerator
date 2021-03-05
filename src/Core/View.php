<?php

namespace BHPGenerator\Core;

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

    // Creating parser view (string)
    public static function parser_string(string $template = '', array $data = [], array $optional = [])
    {
        $parser = single_service('parser');
        $view   = '';

        if (strpos($template, '::'))
        {
            $explode = explode('::', $template);

            for ($i=0; $i <= substr_count($template, '::'); $i++)
            { 
                $view .= $parser->setData($data)->renderString($explode[$i], $optional);
            }
        }

        return empty($view) ? $parser->setData($data)->renderString($template, $optional) : $view;
    }

    // Creating blade view (basic)
    // The default path is app/Views
    // Dynamic path will coming soon :)
    public static function blade(string $name = '', array $data = [], string $cachePath = null)
    {
        $viewPath  = config('Paths')->viewDirectory;
        $cachePath = is_null($cachePath) ? config('Cache')->storePath : $cachePath;

        $blade = new \BHPGenerator\Core\Blade\BladeOne($viewPath, $cachePath);
        $view  = '';

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