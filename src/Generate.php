<?php

namespace BHPGenerator;

/**
 * Generate class 
 */

class Generate extends \BHPGenerator\Core\PreGenerate
{
	/**
	 * Constructor
	 */
	protected function __construct(
		protected string $name,
		protected array  $data = [],
		protected string $render = 'view',
	) { }

	//--------------------------------------------------------------------

	/**
	 * >> Journey Begin
	 * 
	 * Prototype : Generate::initialize()->
	 * 
	 * @param  string $view
	 * @param  array  $data
	 */
	public static function initialize(string $name, array $data = [])
	{
		return new self($name, $data);
	}

	/**
	 * Render option
	 * 
	 * There is 3 option :
	 *   - view
	 *   - parser
	 *   - blade
	 * 
	 * @param string $param
	 */
	public function render(string $param)
	{
		return new self($this->name, $this->data, $param);
	}

	/**
	 * << Journey End
	 */
	public function run()
	{
		return $this->preInitialize($this->name, $this->data)
					->preRender($this->render)
		            ->preRun();
	}
}