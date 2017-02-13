<?php

namespace ZfcUserPixelpin\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\Service\User;

class UserFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new User();
        $service->setServiceManager($serviceLocator);
        return $service;
    }
}
