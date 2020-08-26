# BHPGenerator
Bootstrap 4 template generator for CodeIgniter 4

## Installation | Please use version 2.0 (development)
  1. Create folder in `app/ThirdParty/bhp-generator/src`.
  2. Copy src in this repository into it.
  3. Create namespace `'BHPGenerator' => APPPATH . 'ThirdParty/bhp-generator/src'`.
  4. Copy BHP.php to `app/Config`.
  5. Dont forget to load html helper.

## Tutorial
  1. Include BHPGenerator in your controller using `use BHPGenerator\Generate;`.
  2. Command `return Generate::default($name, $data, $optional);` will generate default configuration.
  3. Reload your browser.

## Use case
    public function index()
    {
       //return view('welcome_message');
       return Generate::default('your_view_name');
    }

## Command | Find more in the comment
if you have 2 part view :
`return Generate::default('part/whatever::your_view_name')`

if you have 3 part view :
`return Generate::default('part/header::your_view_name::part/footer');`

if you have 4 part view :
`return Generate::default('part/header::extra/some_file::your_view_name::part/footer');`

NOTE : So you need 5 or more part view?? Just add more ::

### Alert
The default assets, like bootstrap is using https://github.com/astoart/ui repository. This third-party include pre-load screen.

#### Note
BHP.php is your html basic configuration, like meta, title and etc.

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
      <link href="https://astoart.com/favicon.ico" rel="icon" type="image/ico" />
     
      <!-- Load external CSS -->
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/css/bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fonts/google.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/css/shards.css" rel="stylesheet" type="text/css" />
     
      <!-- Pre-Load Screen CSS -->
      <style type="text/css"> .preloader {position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: #fff; } .loading {position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%); font: 14px arial; } </style>
     
      <!-- Load external JS  -->
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/jquery.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/popper.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/core/js/bootstrap.js" type="text/javascript"></script>
     
      <!-- Title -->
      <title>Your Website Title</title>
     
     </head>
     <body>
     
      <!-- Pre-Load Screen START -->
      <div class="preloader"> <div class="loading"> <img src="https://cdn.jsdelivr.net/gh/astoart/ui/astoart.com/img/loading.gif" width="86"> <p style="font-size: 1.0rem">Please Wait</p> </div> </div>
      <!-- Pre-Load Screen END -->
     
    <h3 class="text-center my-5 py-5">Rendered in 0.0464 seconds.</h3>
     
      <!-- Load external JS  -->
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/fontawesome/js/all.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/gh/astoart/ui/v2/vendor/shards/js/shards.js" type="text/javascript"></script>
     
      <!-- Load Cookie JS -->
      <script type="text/javascript" id="cookieinfo" src="https://cookieinfoscript.com/js/cookieinfo.min.js"></script>
     
      <!-- Pre-Load Screen JS -->
      <script type="text/javascript">$(document).ready(function(){$(".preloader").fadeOut(); })</script>
     
     </body>
    </html>
