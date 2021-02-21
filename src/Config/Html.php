<?php

namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Html extends BaseConfig
{

	/**
	 * --------------------------------------------------------------------------
	 * Doctype Declaration
	 * --------------------------------------------------------------------------
	 *
	 * All HTML documents must start with a <!DOCTYPE> declaration.
	 * The declaration is not an HTML tag. It is an "information" to the browser
	 * about what document type to expect. - W3SCHOOLS.COM
	 *
	 * The default value is 'html5' but you can fill it based on your needed.
	 * See the available list in CodeIgniter userguide.
	 *
	 * @var string
	 */
	public $doctype = 'html5';

	/**
	 * --------------------------------------------------------------------------
	 * Meta Charset
	 * --------------------------------------------------------------------------
	 *
	 * To display an HTML page correctly, a web browser must know the character
	 * set used in the page. - W3SCHOOLS.COM
	 *
	 * In modern browser or HTML5 the default charset is UTF-8, if you have
	 * another option it's up to you. Leave it blank it will use charset from
	 * App.php
	 *
	 * @var string
	 */
	public $charset = '';

	/**
	 * --------------------------------------------------------------------------
	 * Page Language
	 * --------------------------------------------------------------------------
	 *
	 * You should always include the lang attribute inside the <html> tag,
	 * to declare the language of the Web page. This is meant to assist
	 * search engines and browsers. - W3SCHOOLS.COM
	 *
	 * You could set this variable as you want. Leave it blank it will use
	 * defaultLocale from App.php
	 *
	 * @var string
	 */
	public $language = '';

	/**
	 * --------------------------------------------------------------------------
	 * Web Title
	 * --------------------------------------------------------------------------
	 *
	 * The contents of a page title is very important for search engine
	 * optimization (SEO)! The page title is used by search engine algorithms to
	 * decide the order when listing pages in search results. - W3SCHOOLS.COM
	 *
	 * @var string
	 */
	public $title = 'Your Website Title';

	/**
	 * --------------------------------------------------------------------------
	 * Favicon
	 * --------------------------------------------------------------------------
	 *
	 * Leave it blank it will use default protocol base_url('favicon.ico') or
	 * fill it with your own link and the type attribute will auto detect.
	 *
	 * @var string
	 */
	public $favicon = '';

}