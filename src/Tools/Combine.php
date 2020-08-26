<?php namespace BHPGenerator\Tools;

class Combine
{

	/**
	 * Combine 1, 2, or more than 3 view part become one
	 *
	 */
	public static function view(string $name = '', array $data = [], array $optional = [])
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
        else
        {
            $view = view($name, $data, $optional);
        }

        return $view;
	}

}