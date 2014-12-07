<?php namespace VexStudios\Commander;

use VexStudios\Commander\Contracts\Translators\CommandTranslator;

/**
 * Class Translator
 *
 * @package VexStudios\Commander
 */
class Translator implements CommandTranslator {

	/**
	 * Translate an item.
	 *
	 * @param \VexStudios\Commander\Support\Command $item
	 *
	 * @return string
	 */
	public function translate($item)
	{
		return $this->getHandlerName($this->getClassName($item));
	}

	/**
	 * @param \VexStudios\Commander\Support\Command $item
	 *
	 * @return string
	 */
	protected function getClassName($item)
	{
		return get_class($item);
	}

	/**
	 * @param string $commandClass
	 *
	 * @return string
	 */
	protected function getHandlerName($commandClass)
	{
		return $commandClass . 'Handler';
	}

}
