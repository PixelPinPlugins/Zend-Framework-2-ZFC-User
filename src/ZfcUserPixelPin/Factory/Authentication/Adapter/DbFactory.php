<?php

namespace ZfcUserPixelpin\Factory\Authentication\Adapter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\Authentication\Adapter\Db;

class DbFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = new Db();
        $db->setServiceManager($serviceLocator);
        return $db;
    }
}
