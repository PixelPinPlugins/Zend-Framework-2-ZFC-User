<?php

namespace ZfcUserPixelpinTest\Authentication\Adapter\TestAsset;

use ZfcUserPixelpin\Authentication\Adapter\AbstractAdapter;
use ZfcUserPixelpin\Authentication\Adapter\AdapterChainEvent;

class AbstractAdapterExtension extends AbstractAdapter
{
    public function authenticate(AdapterChainEvent $e)
    {
    }
}
