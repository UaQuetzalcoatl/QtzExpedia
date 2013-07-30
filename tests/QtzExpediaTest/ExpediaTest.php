<?php

namespace QtzExpediaTest;

use Zend\EventManager\EventManager;
use Zend\ServiceManager\ServiceManager;

use QtzExpedia\Expedia;

/**
 * Description of ExpediaTest
 *
 * @author Alex Savchenko
 */
class ExpediaTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var \QtzExpedia\Expedia
     */
    protected $expedia;

    public function setUp()
    {
        $this->expedia = new Expedia;
    }

    public function testCanGetEventManager()
    {
        $eventManager = $this->expedia->getEventManager();
        $this->assertInstanceOf('Zend\EventManager\EventManagerInterface', $eventManager);
    }

    public function testCanSetEventManager()
    {
        $eventManager = new EventManager;
        $this->expedia->setEventManager($eventManager);
        $this->assertSame($eventManager, $this->expedia->getEventManager());
    }

    public function testCanSetServiceManager()
    {
        $serviceManager = new ServiceManager;
        $this->expedia->setServiceManager($serviceManager);
        $this->assertSame($serviceManager, $this->expedia->getServiceManager());
    }
}
