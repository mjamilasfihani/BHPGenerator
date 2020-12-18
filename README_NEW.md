# BHPGenerator v2.8
Bootstrap 4 template generator for CodeIgniter 4 (minimum v4.0.4).

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

This `initialize(string)` function is used for tell the Generator which assets will be use.

    return Generate::default('your_view_name');
    return Generate::initialize()->default('your_view_name');
    return Generate::initialize('default')->default('your_view_name');