<?php namespace VexStudios\Commander\Contracts;

/**
 * Interface Handler
 *
 * @package Commander\Contracts
 */
interface Handler {

	/**
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle($command);

}
