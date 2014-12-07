<?php

use VexStudios\Commander\Support\Command;

/**
 * Class TestCommand
 */
class TestCommand extends Command {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @param string $name
	 */
	public function __construct($name = 'Test')
	{
		$this->name = $name;
	}

}
