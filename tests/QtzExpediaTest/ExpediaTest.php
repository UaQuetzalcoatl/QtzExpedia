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

    public function testCanGetApiService()
    {
        $serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager');
        $serviceManager->expects($this->once())
                ->method('get')
                ->with($this->equalTo('QtzExpedia\Api\Hotels'))
                ->will($this->returnValue($this->getMock('QtzExpedia\Api\Hotels')));

        $this->expedia->setServiceManager($serviceManager)
                ->api('hotels');
    }

    public function testTriggerApiEvent()
    {
        $eventManager   = $this->getMock('Zend\EventManager\EventManager');
        $eventManager->expects($this->once())
                ->method('trigger')
                ->with(
                    $this->equalTo('api'),
                    $this->equalTo($this->expedia),
                    $this->equalTo(array('resource' => 'Hotels'))
                );

        $this->expedia->setServiceManager($this->getMock('Zend\ServiceManager\ServiceManager'))
                ->setEventManager($eventManager)
                ->api('hotels');
    }
}
