<?php

namespace ZfcUserPixelpin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;
use ZfcUserPixelpin\Entity\UserInterface as User;

class ZfcUserPixelpinGender extends AbstractHelper
{
    /**
     * @var AuthenticationService
     */
    protected $authService;

    /**
     * __invoke
     *
     * @access public
     * @param \ZfcUserPixelpin\Entity\UserInterface $user
     * @throws \ZfcUserPixelpin\Exception\DomainException
     * @return String
     */
    public function __invoke(User $user = null)
    {
        if (null === $user) {
            if ($this->getAuthService()->hasIdentity()) {
                $user = $this->getAuthService()->getIdentity();
                if (!$user instanceof User) {
                    throw new \ZfcUserPixelpin\Exception\DomainException(
                        '$user is not an instance of User',
                        500
                    );
                }
            } else {
                return false;
            }
        }

        $gender = $user->getGender();

        return $gender;
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
     * @return \ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName
     */
    public function setAuthService(AuthenticationService $authService)
    {
        $this->authService = $authService;
        return $this;
    }
}