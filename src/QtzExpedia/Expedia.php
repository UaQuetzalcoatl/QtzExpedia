<?php

namespace QtzExpedia;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;

use Zend\Filter\Word\UnderscoreToCamelCase;

/**
 * Description of Expedia
 *
 * @author Alex Savchenko
 */
class Expedia implements ServiceManagerAwareInterface, EventManagerAwareInterface
{
    /**
     *
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    /**
     *
     * @var \Zend\EventManager\EventManagerInterface
     */
    protected $events;

    public function api($resource)
    {
        $filter = new UnderscoreToCamelCase;
        $resource = $filter->filter($resource);
        $this->events->trigger('api', $this, array('resource' => $resource));
    }

    /**
     * Gets Event manager
     *
     * @return \Zend\EventManager\EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->events) {
            $this->setEventManager(new EventManager);
        }

        return $this->events;
    }

    /**
     * Sets Event manager
     *
     * @param \Zend\EventManager\EventManagerInterface $eventManager
     * @return \QtzExpedia\Expedia
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(__CLASS__, get_called_class()));
        $this->events = $eventManager;

        return $this;
    }

    /**
     * Sets Service manager
     *
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     * @return \QtzExpedia\Expedia
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }

    /**
     * Gets service manager
     *
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}
