<?php

namespace BHPGenerator\Core;

class View
{

    // Creating default view (basic)
    public static function default(string $name = '', array $data = [], array $options = [])
    {
        $view = '';

        if (strpos($name, '::'))
        {
            $explode = explode('::', $name);

            for ($i=0; $i <= substr_count($name, '::'); $i++)
            { 
                $view .= view($explode[$i], $data, $options);
            }
        }

        return empty($view) ? view($name, $data, $options) : $view;
    }

    // Creating parser view (basic)
	public static function parser(string $view = '', array $data = [], array $options = [])
    {
    	$parser = single_service('parser');
        $view   = '';

        if (strpos($view, '::'))
        {
            $explode = explode('::', $view);

            for ($i=0; $i <= substr_count($view, '::'); $i++)
            { 
                $view .= $parser->setData($data)->render($explode[$i], $options);
            }
        }

        return empty($view) ? $parser->setData($data)->render($view, $options) : $view;
    }

    // Creating parser view (string)
    public static function parserString(string $template = '', array $data = [], array $options = [])
    {
        $parser = single_service('parser');
        $view   = '';

        if (strpos($template, '::'))
        {
            $explode = explode('::', $template);

            for ($i=0; $i <= substr_count($template, '::'); $i++)
            { 
                $view .= $parser->setData($data)->renderString($explode[$i], $options);
            }
        }

        return empty($view) ? $parser->setData($data)->renderString($template, $options) : $view;
    }

    // Blade version | Under Development
    public static function blade(string $name = '', array $data = [])
    {
        $viewPath  = config('Paths')->viewDirectory; // this section is under development
        $cachePath = config('Cache')->storePath;     // this section is under development

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