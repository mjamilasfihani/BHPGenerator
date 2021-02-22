# BHPGenerator v3.0
Bootstrap 4 template generator for CodeIgniter 4.

![GitHub](https://img.shields.io/github/license/mjamilasfihani/BHPGenerator) ![GitHub all releases](https://img.shields.io/github/downloads/mjamilasfihani/BHPGenerator/total)

## Why I made this Library?
When I made a new view file, I always do include and include the assets file. And I hate when I need to reconfigure everything manually, in case different meta, css, js or title. So that I made this library. (basic)

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
  1. If you have more than 1 view files, then using `return Generate::default('view_1::view_2', [$data], [$option]);`.
  2. You can edit html config in `src/Config/Html.php`.

This `initialize(string)` function is used for tell the Generator which assets will be use. In case the default value is `default`, and you can see this 3 use case is same too.

    return Generate::default('your_view_name');
    return Generate::initialize()->default('your_view_name');
    return Generate::initialize('default')->default('your_view_name');

Anyway I include <a href="https://getstisla.com" target="_blank">Stisla</a> at this library. And here is the use case.

	return Generate::initialize('stisla')->default('your_view_name');                           // For 1 view
	return Generate::initialize('stisla')->default('part/header::your_view_name::part/footer'); // For 2 views or more

## Builtin Function
I have created an extra function too.
  1. `html([])` function is used to re-config `src/Config/Html.php`
  2. `meta([])` function is used to re / add new config `src/Config/Meta.php` (only for meta with attribute name)
  3. `body([])` function is used to re / add new config `src/Config/Body.php`

Note : open `src/Config/Meta.php` and `src/Config/Body.php` too for information

## Unwanted Assets?
You can add spesific assets for spesific controller, and how to do that?
I have created :
  1. `Generate::$css_js = [];` has simillar parameter with `src/Config/Assets.php`
  2. add `'replace' => true` inside the array will use the assets in your controller instead.

Note : Number 1 has same template with `src/Config/Assets.php` so just try to experiment with it.

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

Note : change default with `parser('your_view_name')` will use parser feature (basic) in CI 4 and has simillar param with the default.

Then you can try a lot with this library :)