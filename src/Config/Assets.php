<?php namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Assets extends BaseConfig
{

    /**
     * Header asset
     *
     */
    public $assetHeader =
    [
        'external_css' =>
        [
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css',
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fonts/google.css',
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css',
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/css/shards.css'
        ],
        'directed_css' => '',

        'external_js' => 
        [
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/jquery.js',
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/popper.js',
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/bootstrap.js'
        ],
        'directed_js' => ''
    ];

    /**
     * Footer asset
     *
     */
    public $assetFooter =
    [
        'external_js' =>
        [
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js',
            'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js'
        ],
        'directed_js' => ''
    ];

    /**
     * If you want a spesific URI with own assets config, set the url here
     * but you must set in BHPConfig.
     *
     * The logic is :
     *
     * uri = http://example.com/dashboard | in case, you want to use adminlte
     *
     * Then $spesificURI = ['http://example.com/dashboard'];
     *
     * The route = $routes->get('dashboard', 'Home::dashboard');
     *
     * In dashboard method will be =
     *
     * public function dashboard()
     * {
     *      $option =
     *      [
     *          'BHPConfig' =>
     *          [
     *              // hmtl, meta and body config will be default
     *              //
     *              'headerAsset' => ['external_css' => 'to/adminLTE.css'],
     *              'footerAsset' => ['external_js'  => 'to/adminLTE.js'],
     *          ]
     *      ];
     *
     *      return Generate::default('view_name', [], $option);
     * }
     *
     * What have we done here? We have re-configed the default assets,
     * so we will use BHPConfig instead. Not using default assets.
     *
     * *NOTE : don't forget to include jquery, for pre-loading purpose
     *
     */
    public $spesificURI = [];

}