<?php namespace BHPGenerator\Storage;

// Save your own config here,
// then call it.
//
// This is custom config, that load with $optional

class Data
{

	public static function stisla()
	{
		return
		[
			'BHPConfig' =>
			[
				'headerAsset' =>
				[
					'external_css' =>
					[
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css',
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css',
						
						'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/style.css',
						'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/components.css',
					],
					'external_js' =>
					[
						'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/jquery.js',
			            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/popper.js',
			            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/bootstrap.js'
					],
				],
				'footerAsset' =>
				[
					'external_js' =>
					[
						'https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/dist/jquery.nicescroll.js',
						'https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.js',
						'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/stisla.js',
						'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/scripts.js',
						'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/custom.js'
					],
				],

				'assetReplace' => true
			]
		];
	}

}