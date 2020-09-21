# BHPGenerator
Bootstrap 4 template generator for CodeIgniter 4

## Installation
  1. Create folder in `app/ThirdParty/bhp-generator/src`.
  2. Copy src into it.
  3. Create namespace `'BHPGenerator' => APPPATH . 'ThirdParty/bhp-generator/src'`.
  4. Dont forget to load html helper.

## Basic Using
  1. Include BHPGenerator in your controller using `use BHPGenerator\Generate;`.
  2. `return Generate::default('your_view_name');` will generate default view.
  3. Reload your browser.
  4. If you want to edit the assets, open `src/Config/Assets.php`

### Fast Tutorial
This is same

    return Generate::default('your_view_name');
    return Generate::initialize()->default('your_view_name');
    return Generate::initialize('default')->default('your_view_name');

Using stisla config

    return Generate::initialize('stisla')->default('your_view_name');

You can add your own config, but you must follow the template. See in Config/Assets.php for more information.

You must put default or combine function at last.
Please look Config/BHP.php for more information

    return Generate::initialize('stisla')
                   ->html([])
                   ->meta([])
                   ->body([])
                   ->default('your_view_name');

You can also do this

    return Generate::body(['class' => 'login'])->default('your_view_name');

### reConfig or add new config Assets.php
Header and Footer Assets
Please look Config/Assets.php

    Generate::$assetsHeader = [];
    Generate::$assetsFooter = [];

Want to reConfig? Just set to true, default is false

    Generate::$assetsReConfig = false;

Example use case
  
    Generate::$assetsHeader =
    [
        'directed_css' => '.login {bg-color: dark}'
    ];
    return Generate::body(['class' => 'login'])->default('your_view_name');

it will add login directed css without reConfig

tips : `Generate::$asset = 'stisla';` will use stisla instead, without using `initialize()` function

### Hold up!
The default assets is using https://github.com/astoart/ui repository. This generator include pre-load screen.

#### Note
BHP.php is your html basic configuration, like meta, title and etc. and Assets.php is your assets configuration.

#### Raw | Elapsed time can be different :)
    <!DOCTYPE html>
    <html lang="en">
     <head>

      <!-- Charset utf-8 -->
      <meta charset="utf-8">

      <!-- Required meta tags -->
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <meta name="author" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

      <!-- Favicon.ico -->
      <link href="http://localhost/github_test/public/favicon.ico" rel="icon" type="image/ico" />

      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fonts/google.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/css/shards.css" rel="stylesheet" type="text/css" />

      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/jquery.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/popper.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/bootstrap.js" type="text/javascript"></script>

      <!-- Pre-Load Screen CSS -->
      <style type="text/css"> .preloader {position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: #fff; } .loading {position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%); font: 14px arial; } </style>

      <!-- Title -->
      <title>Your Website Title</title>

     </head>
     <body>

      <!-- Pre-Load Screen START -->
      <div class="preloader"> <div class="loading"> <img src="https://cdn.jsdelivr.net/gh/astoart/ui/astoart.com/img/loading.gif" width="86"> <p style="font-size: 1.0rem">Please Wait</p> </div> </div>
      <!-- Pre-Load Screen END -->

      <div class="my-4 py-4 mx-auto text-center">
        <h1 class="text-danger my-5"><i class="fas fa-heart fa-3x"></i></h1>
        <h3>Coming Soon</h3>
        <p>Rendered in 0.0258 seconds.</p>
      </div>

      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js" type="text/javascript"></script>

      <!-- Load Cookie JS -->
      <script type="text/javascript" id="cookieinfo" src="https://cookieinfoscript.com/js/cookieinfo.min.js"></script>

      <!-- Pre-Load Screen JS -->
      <script type="text/javascript">$(document).ready(function(){$(".preloader").fadeOut(); })</script>

     </body>
    </html>

The original elapsed_time from my device is 0.0207 seconds. You can increase the speed with make your code become one line without newline (don't forget backup the original code).