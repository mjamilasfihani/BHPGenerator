# BHPGenerator v2.8
Bootstrap 4 template generator for CodeIgniter 4 (minimum v4.0.4).
![GitHub all releases](https://img.shields.io/github/downloads/mjamilasfihani/BHPGenerator/total)

## Why I made this Library?
When I made a new view file, I always do include and include the assets file. And I hate when I need to reconfigure everything manually, in case different meta, css, js or title. So that I made this library.

## Installation
  1. Create folder `bhp-generator` in `app/ThirdParty`.
  2. Copy src directory into it.
  3. The namespace will be `'BHPGenerator' => APPPATH . 'ThirdParty/bhp-generator/src'`.
  4. Dont forget to load html helper using `helper('html')`.

## Basic Using
  1. Include BHPGenerator in your controller using `use BHPGenerator\Generate;`.
  2. `return Generate::default('your_view_name', [$data], [$option]);` will generate default view.
  3. Reload your browser.
  4. If you want to edit the assets, open `src/Config/Assets.php`.

## Advanced Using
  1. If you have more than 1 view files, then using `return Generate::combine('view_1::view_2', [$data], [$option]);`.
  2. You can edit basic html config in `src/Config/BHP.php`.

This `initialize(string)` function is used for tell the Generator which assets will be use. In case the default value is `default`, and you can see this 3 use case is same too.

    return Generate::default('your_view_name');
    return Generate::initialize()->default('your_view_name');
    return Generate::initialize('default')->default('your_view_name');

Anyway I include <a href="https://getstisla.com" target="_blank">Stisla</a> at this library. And here is the use case.

	return Generate::initialize('stisla')->default('your_view_name');                           // For 1 view
	return Generate::initialize('stisla')->combine('part/header::your_view_name::part/footer'); // For 2 views or more

## Builtin Function
I have created an extra function too.
  1. `html([])` function is used to re-config `$htmlConfig`
  2. `meta([])` function is used to re-config / add new config `$metaConfig`
  3. `body([])` function is used to re-config / add new config `$bodyConfig`

Note : open `src/Config/BHP.php` for information

## Unwanted Assets?
You can add spesific assets for spesific controller, and how to do that?
I have created :
  1. `Generate::$assetsHeader = [];` is simillar with `'HEADER' => []`
  2. `Generate::$assetsFooter = [];` is simillar with `'FOOTER' => []`
  3. `Generate::$assetsReConfig = false;` is used to give choice, wanna combine assets from `src/Config/Assets.php` with these config or just use these config (without using assets from `Assets.php`).

Note : Number 1 and 2 has same template with `src/Config/Assets.php` so just try to experiment with it.

### Extra Use Case
Here I give an extra use case.

	Generate::$assetsHeader =
    [
        'directed_css' => '.login {bg-color: dark}'
    ];
    return Generate::body(['class' => 'login'])->default('your_view_name');

    //--------------------------------------------------------

    return Generate::html(['title' => 'New Title'])->combine('view_1::view_2::view_3');

    //--------------------------------------------------------

    return Generate::meta(['description' => 'New Description in Meta'])->body(['id' => 'app'])->default('your_view_name');

Then you can try a lot with this library :)

### Hold up!
The default assets is using https://github.com/astoart/ui repository. This generator include pre-load screen.

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