<?php namespace VexStudios\Commander\Support;

use InvalidArgumentException;

/**
 * Class Command
 *
 * @package VexStudios\Commander\Support
 */
abstract class Command {

	/**
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->getAttribute($key);
	}

	/**
	 * @param string $key
	 *
	 * @return mixed
	 * @throws InvalidArgumentException
	 */
	protected function getAttribute($key)
	{
		if (isset($this->$key))
		{
			return $this->$key;
		}

		if (isset($this->attributes) && isset($this->attributes[$key]))
		{
			return $this->attributes[$key];
		}

		$class = get_class();

		throw new InvalidArgumentException("Class [$class] does not have an attribute [$key].");
	}

}
