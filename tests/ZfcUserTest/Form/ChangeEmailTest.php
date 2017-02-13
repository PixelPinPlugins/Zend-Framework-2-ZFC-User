<?php

namespace ZfcUserPixelpinTest\Form;

use ZfcUserPixelpin\Form\ChangeEmail as Form;

class ChangeEmailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZfcUserPixelpin\Form\ChangeEmail::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\AuthenticationOptionsInterface');

        $form = new Form(null, $options);

        $elements = $form->getElements();

        $this->assertArrayHasKey('identity', $elements);
        $this->assertArrayHasKey('newIdentity', $elements);
        $this->assertArrayHasKey('newIdentityVerify', $elements);
        $this->assertArrayHasKey('credential', $elements);
    }

    /**
     * @covers ZfcUserPixelpin\Form\ChangeEmail::getAuthenticationOptions
     * @covers ZfcUserPixelpin\Form\ChangeEmail::setAuthenticationOptions
     */
    public function testSetGetAuthenticationOptions()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\AuthenticationOptionsInterface');
        $form = new Form(null, $options);

        $this->assertSame($options, $form->getAuthenticationOptions());
    }
}
