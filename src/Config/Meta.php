<?php

namespace BHPGenerator\Config;

use CodeIgniter\Config\BaseConfig;

class Meta extends BaseConfig
{

	/**
	 * --------------------------------------------------------------------------
	 * Description
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta name="description" content="..." />
	 *
	 * @var string
	 */
	public $description = '';

	/**
	 * --------------------------------------------------------------------------
	 * Keywords
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta name="keywords" content="apple, banana, ..." />
	 *
	 * @var array
	 */
	public $keywords = [];

	/**
	 * --------------------------------------------------------------------------
	 * Author
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta name="author" content="..." />
	 *
	 * @var string
	 */
	public $author = '';

	/**
	 * --------------------------------------------------------------------------
	 * Viewport
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta name="viewport" content="..." />
	 * Default is 'width=device-width, initial-scale=1, shrink-to-fit=no'
	 *
	 * @var string
	 */
	public $viewport = 'width=device-width, initial-scale=1, shrink-to-fit=no';

	/**
	 * --------------------------------------------------------------------------
	 * Custom Meta - name Attribute
	 * --------------------------------------------------------------------------
	 *
	 * If you have your own meta put it here. There is 3 types attribute of meta : name,
	 * http-equiv and property.
	 *
	 * This config will generate <meta name="name" content="..." />
	 *
	 * Do not EVER set meta description, keywords, author and viewport in here :)
	 *
	 * @see https://gist.github.com/lancejpollard/1978404
	 * @var array
	 */
	public $attributeName = [];

	/**
	 * --------------------------------------------------------------------------
	 * http-equiv Attribute - Special Config
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta http-equiv="name" content="..." />
	 *
	 * @var array
	 */
	public $attributeHttpEquiv = [];

	/**
	 * --------------------------------------------------------------------------
	 * property Attribute -  Special Config
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta property="name" content="..." />
	 *
	 * @var array
	 */
	public $attributeProperty = [];

}