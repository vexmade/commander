<?php namespace VexStudios\Commander;

use Illuminate\Contracts\Container\Container;
use VexStudios\Commander\Contracts\CommandBus as CommandBusInterface;
use VexStudios\Commander\Contracts\Translators\CommandTranslator;
use VexStudios\Commander\Support\Command;

/**
 * Class CommandBus
 *
 * @package VexStudios\Commander
 */
class CommandBus implements CommandBusInterface {

	/**
	 * @var Container
	 */
	protected $ioc;

	/**
	 * @var CommandTranslator
	 */
	protected $translator;

	/**
	 * @param CommandTranslator $translator
	 */
	public function __construct(Container $ioc, CommandTranslator $translator)
	{
		$this->ioc = $ioc;
		$this->translator = $translator;
	}

	/**
	 * @param Command $command
	 *
	 * @return mixed
	 */
	public function execute(Command $command)
	{
		$handler = $this->translator->translate($command);

		// Run handle function on Handler
		return $this->ioc->make($handler)->handle($command);
	}

}
