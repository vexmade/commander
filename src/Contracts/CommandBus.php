<?php namespace VexStudios\Commander\Contracts;

use VexStudios\Commander\Support\Command;

/**
 * Interface CommandBus
 *
 * @package VexStudios\Commander\Contracts
 */
interface CommandBus {

	/**
	 * @param Command $command
	 *
	 * @return mixed
	 */
	public function execute(Command $command);

}
