<?php

namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Assets extends BaseConfig
{

    // Default
    public $default =
    [
        'HEADER::external_css' =>
        [
            'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.css',
            'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14.0/css/all.css',
        ],
        'HEADER::directed_css' => '',

        'HEADER::external_js' => [],
        'HEADER::directed_js' => '',

        'FOOTER::external_js' =>
        [
            'https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.js',
            'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/popper.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.js'
        ],
        'FOOTER::directed_js' => ''
    ];

    // Stisla
    public $stisla =
    [
        'HEADER::external_css' =>
        [
            'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.css',
            'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14.0/css/all.css',
            'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/style.css',
            'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/components.css',
        ],
        'HEADER::directed_css' => '',

        'HEADER::external_js' =>
        [
            'https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.js',
            'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/popper.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.js'
        ],
        'HEADER::directed_js' => '',

        'FOOTER::external_js' =>
        [
            'https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/dist/jquery.nicescroll.js',
            'https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.js',
            'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/stisla.js',
            'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/scripts.js',
            'https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/custom.js'
        ],
        'FOOTER::directed_js' => ''
    ];

}