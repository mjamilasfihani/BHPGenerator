<?php

//--------------------------------------------------------------------

public function index()
{
	$data = [];

	// return default view
	//
	return Generate::default('your_view_name', $data);
}

//--------------------------------------------------------------------

public function index()
{
	$data = [];

	// combine 2 or more part become one view
	//
	return Generate::combine('part/header::your_view_name::part/footer', $data);
}

//--------------------------------------------------------------------

public function index()
{
	$data = [];

	// This optional will re-config (for htmlConfig only)
	// and re-config or add new config (for meta and body config).
	//
	// You can call this optional is spesific config for spesific function / uri.
	// So you don't need to worry if your uri has different configuration

	// NOTE : This optional is all the available command
	//
	$optional =
	[
		'BHPConfig' =>
		[
			'htmlConfig' =>
			[
				'doctype' => '',
				'charset' => '',
				'lang'    => '',
				'title'   => '',
			],
			'metaConfig' => [],
			'bodyConfig' => [],

			// More command is coming soon
			//
		]
	];

	//--------------------------------------------------------------------

	// You can write a spesific re-configuration too
	//
	$optional =
	[
		'BHPConfig' =>
		[
			// let htmlConfig and metaConfig become default
			'bodyConfig' => ['class' => 'my-login'],
		]
	];

	// OR

	$optional =
	[
		'BHPConfig' =>
		[
			// let change the title and leave all to be default
			'htmlConfig' => ['title' => 'This is New Title :)'],
		]
	];

	// It can be used in default or combine method
	//
	//return Generate::default('your_view_name', $data, $optional);
	return Generate::combine('part/header::your_view_name::part/footer', $data, $optional);
}

//--------------------------------------------------------------------