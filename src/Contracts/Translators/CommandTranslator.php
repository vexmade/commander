<?php namespace VexStudios\Commander\Contracts\Translators;

use VexStudios\Commander\Contracts\Translator;

interface CommandTranslator extends Translator {

	/**
	 * @param \VexStudios\Commander\Support\Command $item
	 *
	 * @return string
	 */
	public function translate($item);

}
