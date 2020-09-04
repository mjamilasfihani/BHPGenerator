<?php namespace BHPGenerator\Core;

class Tools
{

    /**
     * Just default view from CodeIgniter
     *
     */
    public static function default(string $name = '', array $data = [], array $optional = [])
    {
        return view($name, $data, $optional);
    }

	/**
	 * Combine 2 or more view part become one
	 *
	 */
	public static function combine(string $name = '', array $data = [], array $optional = [])
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

        return $view;
	}

}