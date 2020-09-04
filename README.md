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

Tips : Read EXAMPLE.php for more information

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
      
      <!-- Load external CSS -->
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fonts/google.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/css/shards.css" rel="stylesheet" type="text/css" />
      
      <!-- Load external JS  -->
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
        <p>Rendered in 0.0279 seconds.</p>
      </div>
      
      <!-- Load external JS  -->
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js" type="text/javascript"></script>
      
      <!-- Load Cookie JS -->
      <script type="text/javascript" id="cookieinfo" src="https://cookieinfoscript.com/js/cookieinfo.min.js"></script>
      
      <!-- Pre-Load Screen JS -->
      <script type="text/javascript">$(document).ready(function(){$(".preloader").fadeOut(); })</script>
      
     </body>
    </html>