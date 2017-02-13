<?php

namespace ZfcUserPixelpinTest\Form;

use ZfcUserPixelpin\Form\ChangePassword as Form;

class ChangePasswordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZfcUserPixelpin\Form\ChangePassword::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\AuthenticationOptionsInterface');

        $form = new Form(null, $options);

        $elements = $form->getElements();

        $this->assertArrayHasKey('identity', $elements);
        $this->assertArrayHasKey('credential', $elements);
        $this->assertArrayHasKey('newCredential', $elements);
        $this->assertArrayHasKey('newCredentialVerify', $elements);
    }

    /**
     * @covers ZfcUserPixelpin\Form\ChangePassword::getAuthenticationOptions
     * @covers ZfcUserPixelpin\Form\ChangePassword::setAuthenticationOptions
     */
    public function testSetGetAuthenticationOptions()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\AuthenticationOptionsInterface');
        $form = new Form(null, $options);

        $this->assertSame($options, $form->getAuthenticationOptions());
    }
}
