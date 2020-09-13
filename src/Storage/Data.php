<?php namespace BHPGenerator\Storage;

// Save your own config here,
// then call it.
//
// This is custom config, that load with $optional

class Data
{

	public static function adminlte()
	{
		$optional =
		[
			'BHPConfig' =>
			[
				'bodyConfig' => ['class' => 'hold-transition sidebar-mini'],

				'headerAsset' =>
				[
					'external_css' =>
					[
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/adminlte/css/adminlte.css',
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fonts/google.css',
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css',
					],
					'external_js'  =>
					[
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/adminlte/js/jquery.js',
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/adminlte/js/bootstrap.bundle.js',
					],
				],
				'footerAsset' =>
				[
					'external_js' =>
					[
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js',
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/adminlte/js/adminlte.js',
					]
				]
			]
		];

		return $optional;
	}

}