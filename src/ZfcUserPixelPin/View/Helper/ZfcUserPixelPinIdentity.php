<?php

namespace ZfcUserPixelpin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;

class ZfcUserPixelpinIdentity extends AbstractHelper
{
    /**
     * @var AuthenticationService
     */
    protected $authService;

    /**
     * __invoke
     *
     * @access public
     * @return \ZfcUserPixelpin\Entity\UserInterface
     */
    public function __invoke()
    {
        if ($this->getAuthService()->hasIdentity()) {
            return $this->getAuthService()->getIdentity();
        } else {
            return false;
        }
    }

    /**
     * Get authService.
     *
     * @return AuthenticationService
     */
    public function getAuthService()
    {
        return $this->authService;
    }

    /**
     * Set authService.
     *
     * @param AuthenticationService $authService
     * @return \ZfcUserPixelpin\View\Helper\ZfcUserPixelpinIdentity
     */
    public function setAuthService(AuthenticationService $authService)
    {
        $this->authService = $authService;
        return $this;
    }
}
