# BHPGenerator v3.2.2
Template engine for CodeIgniter 4 (You can load Bootstrap, Bulma, Stisla or etc here).

![GitHub](https://img.shields.io/github/license/mjamilasfihani/BHPGenerator) ![GitHub all releases](https://img.shields.io/github/downloads/mjamilasfihani/BHPGenerator/total) ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/mjamilasfihani/BHPGenerator)

## Why I made this Library?
When I made a new view file, I always do include and include the assets file. And I hate when I need to reconfig everything manually, in case different meta, css, js or title. So I made this library.

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
  1. If you have more than 1 view files, then separate your view using `::`.
  2. So, your view will be `Generate::view('view_1::view_2::view_3')`

This `initialize(string)` function is used to tell the Generator which asset will be used. The default value is `default`.

    return Generate::initialize('default')->default('your_view_name');

Anyway I include <a href="https://getstisla.com" target="_blank">Stisla</a> at this library. And here is the use case.

    return Generate::initialize('stisla')->default('your_view_name');                           // For 1 view
    return Generate::initialize('stisla')->default('part/header::your_view_name::part/footer'); // For 2 views or more

Or

    $this->BHP = Generate::initialize('stisla'); // create an BHPGenerator object
    $this->BHP->default('your_view_name');       // loading view with Stisla asset

## Builtin Function
I have created an extra function too.
  1. `html([])` function is used to re-config `src/Config/Html.php` (languange and title).
  2. `meta([])` function is used to re / add new config `src/Config/Meta.php` (meta with 'name' attribute).
  3. `body([])` function is used to re / add new config `src/Config/Body.php` (attributes only).
  4. `metaHttpEquiv([])` function is used to re / add new config `src/Config/Meta.php` (meta with 'http-equiv' attribute).
  5. `metaProperty([])` function is used to re / add new config `src/Config/Meta.php` (meta with 'property' attribute).

## Directly Asset?
You can add spesific asset for spesific controller, and how to do that?
Here is the way :
  1. Add `Generate::$css_js = [];`
  2. Fill it with your assets (has same layout with `src/Config/Assets.php`).
  3. If you want to use the asset instead add `'replace' => true` inside it.

### Extra Use Case
Here I give an extra use case.

	  Generate::$css_js =
    [
        'HEADER::directed_css' => '.login {bg-color: dark}'
    ];
    return Generate::body(['class' => 'login'])->default('your_view_name');

    //--------------------------------------------------------

    return Generate::html(['title' => 'New Title'])->default('view_1::view_2::view_3');

    //--------------------------------------------------------

    return Generate::meta(['description' => 'New Description in Meta'])->body(['id' => 'app'])->default('your_view_name');

Note : change default with `parser('your_view_name')` will use parser feature in CI 4 or `parserString('your_view_name')` for `renderString()` in parser and has simillar param with the default. You can also use `blade('your_view_name')` if you want to use blade version (under development).

Blade library by https://github.com/EFTEC/BladeOne and Default assets by https://getbootstrap.com/