<?php

namespace Qafoo\CfpBundle\Features\Context;

use Behat\Behat\Context\BehatContext;

use Behat\MinkExtension\Context\MinkContext;

use Behat\Symfony2Extension\Context\KernelDictionary;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Feature context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Symfony2 extension trait for access to kernel
     */
    use KernelDictionary;

    /**
     * Registers sub contexts
     *
     * @return void
     */
    public function __construct()
    {
        $this->useContext('list_cfps', new ListingFeatureContext());
    }

    /**
     * Mapping of form identifiers to local paths
     *
     * @var array
     */
    protected $formMap = array(
        'new_cfp' => '/cfp/new',
    );

    /**
     * @Given /^I am in form "([^"]*)"$/
     */
    public function iAmInForm($formName)
    {
        $this->getSession()->visit($this->locatePath(
            $this->getPathForFormIdentifier($formName)
        ));
    }

    /**
     * @Given /^I wait for the help box to appear$/
     */
    public function iWaitForTheHelpBoxToAppear()
    {
        $this->getSession()->wait(
            5000,
            "$('.popover').length > 0"
        );
    }

    /**
     * Retrieve the path for the given $formIdentifier
     *
     * @param string $formIdentifier
     * @return string The path for $formIdentifier
     *
     * @throws \Exception if no $formIdentifier is not recognized
     */
    protected function getPathForFormIdentifier($formIdentifier)
    {
        if (!isset($this->formMap[$formIdentifier])) {
            throw new \Exception("Form $formIdentifier not recognized.");
        }
        return $this->formMap[$formIdentifier];
    }
}
