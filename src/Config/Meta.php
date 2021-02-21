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
	 * If you have your own array put it here. There is 3 types of meta : name,
	 * http-equiv and property.
	 *
	 * See the list at https://gist.github.com/lancejpollard/1978404
	 *
	 * @var array
	 */
	public $attributeName = [];

	/**
	 * --------------------------------------------------------------------------
	 * http-equiv Attribute
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta http-equiv="name" content="..." />
	 *
	 * @var array
	 */
	public $attributeHttpEquiv = [];

	/**
	 * --------------------------------------------------------------------------
	 * property Attribute
	 * --------------------------------------------------------------------------
	 *
	 * This will generate <meta property="name" content="..." />
	 *
	 * @var array
	 */
	public $attributeProperty = [];

}