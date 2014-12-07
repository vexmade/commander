<?php

use Prophecy\Prophet;
use VexStudios\Commander\CommandBus;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'TestCommand.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'TestCommandHandler.php';

/**
 * Class CommandBusTest
 */
class CommandBusTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Prophet
	 */
	protected $prophet;

	public function setUp()
	{
		$this->prophet = new Prophet;
	}

	public function tearDown()
	{
		$this->prophet->checkPredictions();
	}

	/**
	 * @test
	 */
	public function it_executes_commands()
	{
		$commander = $this->getCommandBus();

		$response = $commander->execute(new TestCommand);

		$this->assertEquals('Test', $response);
	}

	/**
	 * @return CommandBus
	 */
	protected function getCommandBus()
	{
		/** @var Illuminate\Contracts\Container\Container|Prophecy\Prophecy\ObjectProphecy $container */
		$container = $this->prophet->prophesize('Illuminate\Contracts\Container\Container');
		$container->make('TestCommandHandler')->willReturn(new TestCommandHandler());

		/** @var VexStudios\Commander\Contracts\Translators\CommandTranslator|Prophecy\Prophecy\ObjectProphecy $translator */
		$translator = $this->prophet->prophesize('VexStudios\Commander\Contracts\Translators\CommandTranslator');
		$translator->translate(new TestCommand)->willReturn('TestCommandHandler');

		return new CommandBus($container->reveal(), $translator->reveal());
	}

}
