<?php

namespace BHPGenerator\Core;

class Template
{
	protected function view(string $name, array $data)
	{
		return view($name, $data);
	}

	protected function parser(string $name, array $data)
	{
		return view($name, $data);
	}

	protected function blade(string $name, array $data)
	{
		return view($name, $data);
	}
}