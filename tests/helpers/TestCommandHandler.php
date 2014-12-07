<?php

use VexStudios\Commander\Contracts\Handler;

class TestCommandHandler implements Handler {

	/**
	 * @param TestCommand $command
	 *
	 * @return mixed
	 */
	public function handle($command)
	{
		return $command->name;
	}
}
