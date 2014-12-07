Feature: Command Execution
  In order to separate actions from endpoints
  As a developer
  I need to be able to add commands to the CommandBus

  Scenario: Executing a command
    Given there is a basic command
    And there is a command bus
    When I give the command to the bus
    Then I should get the expected response
