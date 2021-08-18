<?php

namespace BHPGenerator\Core;

class PreGenerate extends Template
{
	/**
	 * Constructor
	 */
	protected function __construct(
		protected string $name,
		protected array  $data,
		protected string $render,
	) { }

	protected function preInitialize(string $name, array $data)
	{
		return new self($name, $data, $this->render);
	}

	protected function preRender(string $render)
	{
		return new self($this->name, $this->data, $render);
	}

	protected function preRun()
	{
		return match ($this->render)
		{
			'view'   => $this->view($this->name, $this->data),
			'parser' => $this->parser($this->name, $this->data),
			'blade'  => $this->blade($this->name, $this->data),
		};
	}
}