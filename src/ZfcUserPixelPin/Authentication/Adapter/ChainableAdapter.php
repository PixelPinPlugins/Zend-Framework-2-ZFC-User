<?php

namespace ZfcUserPixelpin\Authentication\Adapter;

interface ChainableAdapter
{
    public function authenticate(AdapterChainEvent $e);
}
