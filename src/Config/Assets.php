<?php namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Assets extends BaseConfig
{

    /**
     * Default Assets
     *
     */
    public $default =
    [
        'HEADER' =>
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
        ],
        'FOOTER' =>
        [
            'external_js' =>
            [
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js'
            ],
            'directed_js' => ''
        ]
    ];

    /**
     * Stisla Assets
     *
     */
    public $stisla =
    [
        'HEADER' =>
        [
            'external_css' =>
            [
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css',
                'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/style.css',
                'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/components.css',
            ],
            'directed_css' => '',

            'external_js' =>
            [
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/jquery.js',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/popper.js',
                'https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/bootstrap.js'
            ],
            'directed_js' => ''
        ],
        'FOOTER' =>
        [
            'external_js' =>
            [
                'https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/dist/jquery.nicescroll.js',
                'https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.js',
                'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/stisla.js',
                'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/scripts.js',
                'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/custom.js'
            ],
            'directed_js' => ''
        ]
    ];

}