<?php

namespace Qafoo\CfpBundle\Features\Context;

require_once 'PHPUnit/Autoload.php';

use Behat\Behat\Context\BehatContext;

use Behat\Gherkin\Node\TableNode;

use Behat\Symfony2Extension\Context\KernelDictionary;

use Qafoo\CfpBundle\Entity\Cfp;

use \PHPUnit_Framework_Assert as Assertion;

/**
 * Feature context.
 */
class ListingFeatureContext extends BehatContext
{
    /**
     * Access methods Symfony kernel
     */
    use KernelDictionary;

    /**
     * Mapping of view identifiers to local paths
     *
     * @var array
     */
    protected $viewMap = array(
        'CFP listing' => '/cfp',
    );

    /**
     * @When /^I view "([^"]*)"$/
     */
    public function iView($viewName)
    {
        $this->getSession()->visit($this->locatePath(
            $this->getPathForView($viewName)
        ));
    }

    /**
     * Retrieve the path for the given $viewName
     *
     * @param string $viewName
     * @return string The path for $viewName
     *
     * @throws \Exception if no $viewName is not recognized
     */
    protected function getPathForView($viewName)
    {
        if (!isset($this->viewMap[$viewName])) {
            throw new \Exception("View '$viewName' not recognized.");
        }
        return $this->viewMap[$viewName];
    }

    /**
     * @Given /^there are no CFPs$/
     */
    public function thereAreNoCfps()
    {
        $this->cleanupDatabase();
    }

    /**
     * Sets the database to a clean state
     *
     * @return void
     */
    protected function cleanupDatabase()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'DELETE Qafoo\\CfpBundle\\Entity\\Cfp'
        );
        $query->execute();
    }

    /**
     * Returns the doctrine entity manager
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }

    /**
     * @Given /^there are CFPs:$/
     */
    public function thereAreCfps(TableNode $table)
    {
        $this->cleanupDatabase();

        $entityManager = $this->getEntityManager();

        foreach ($table->getHash() as $row)
        {
            $cfp = new Cfp();
            $cfp->setConferenceName($row['Conference Name']);
            $cfp->setUrl($row['URL']);

            $cfp->setStart(new \DateTime());
            $cfp->setEnd(new \DateTime());
            $cfp->setConferenceUrl('http://example.com');
            $cfp->setConferenceDate(new \DateTime());

            $entityManager->persist($cfp);
        }

        $entityManager->flush();
    }

    /**
     * @Then /^I see (\d+) CFPs$/
     */
    public function iSeeCfps($numberOfCfps)
    {
        $page = $this->getSession()->getPage();
        $cfpList = $page->find('css', 'ul#cfps');

        Assertion::assertNotNull($cfpList);

        $cfpListItems = $cfpList->findAll('css', 'li');

        Assertion::assertCount((int)$numberOfCfps, $cfpListItems);
    }

    /**
     * Returns the Mink session
     *
     * @return \Behat\Mink\Session
     */
    protected function getSession()
    {
        return $this->getMainContext()->getSession();
    }

    /**
     * Locate path indirection to Mink context
     *
     * @param string $path
     * @return string
     */
    protected function locatePath($path)
    {
        return $this->getMainContext()->locatePath($path);
    }
}

