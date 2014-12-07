<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use VexStudios\Commander\CommandBus;

require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/TestCommand.php';
require_once __DIR__ . '/../../helpers/TestCommandHandler.php';

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext {

	/**
	 * @var VexStudios\Commander\Support\Command
	 */
	protected $command;

	/**
	 * @var VexStudios\Commander\Contracts\CommandBus
	 */
	protected $commandBus;

	/**
	 * @var string
	 */
	protected $response;

	/**
	 * Initializes context.
	 *
	 * Every scenario gets its own context instance.
	 * You can also pass arbitrary arguments to the
	 * context constructor through behat.yml.
	 */
	public function __construct()
	{
	}

	/**
	 * @Given there is a basic command
	 */
	public function thereIsABasicCommand()
	{
		$this->command = new TestCommand;
	}

	/**
	 * @Given there is a command bus
	 */
	public function thereIsACommandBus()
	{
		$this->commandBus = new CommandBus(
			new \Illuminate\Container\Container(),
			new \VexStudios\Commander\Translator()
		);
	}

	/**
	 * @When I give the command to the bus
	 */
	public function iGiveTheCommandToTheBus()
	{
		$this->response = $this->commandBus->execute($this->command);
	}

	/**
	 * @Then I should get the expected response
	 */
	public function iShouldGetTheExpectedResponse()
	{
		PHPUnit_Framework_Assert::assertEquals('Test', $this->response);
	}
}
