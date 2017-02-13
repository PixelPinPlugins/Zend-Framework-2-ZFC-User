<?php

namespace ZfcUserPixelpinTest\Mapper;

use ZfcUserPixelpin\Mapper\UserHydrator as Hydrator;

class UserHydratorTest extends \PHPUnit_Framework_TestCase
{
    protected $hydrator;

    public function setUp()
    {
        $hydrator = new Hydrator;
        $this->hydrator = $hydrator;
    }

    /**
     * @covers ZfcUserPixelpin\Mapper\UserHydrator::extract
     * @expectedException ZfcUserPixelpin\Mapper\Exception\InvalidArgumentException
     */
    public function testExtractWithInvalidUserObject()
    {
        $user = new \StdClass;
        $this->hydrator->extract($user);
    }

    /**
     * @covers ZfcUserPixelpin\Mapper\UserHydrator::extract
     * @covers ZfcUserPixelpin\Mapper\UserHydrator::mapField
     * @dataProvider dataProviderTestExtractWithValidUserObject
     * @see https://github.com/ZF-Commons/ZfcUserPixelpin/pull/421
     */
    public function testExtractWithValidUserObject($object, $expectArray)
    {
        $result = $this->hydrator->extract($object);
        $this->assertEquals($expectArray, $result);
    }

    /**
     * @covers ZfcUserPixelpin\Mapper\UserHydrator::hydrate
     * @expectedException ZfcUserPixelpin\Mapper\Exception\InvalidArgumentException
     */
    public function testHydrateWithInvalidUserObject()
    {
        $user = new \StdClass;
        $this->hydrator->hydrate(array(), $user);
    }

    /**
     * @covers ZfcUserPixelpin\Mapper\UserHydrator::hydrate
     * @covers ZfcUserPixelpin\Mapper\UserHydrator::mapField
     */
    public function testHydrateWithValidUserObject()
    {
        $user = new \ZfcUserPixelpin\Entity\User;

        $expectArray = array(
            'username' => 'zfcuser',
            'email' => 'Zfc User',
            'display_name' => 'ZfcUserPixelpin',
            'password' => 'ZfcUserPixelpinPassword',
            'state' => 1,
            'user_id' => 1
        );

        $result = $this->hydrator->hydrate($expectArray, $user);

        $this->assertEquals($expectArray['username'], $result->getUsername());
        $this->assertEquals($expectArray['email'], $result->getEmail());
        $this->assertEquals($expectArray['display_name'], $result->getDisplayName());
        $this->assertEquals($expectArray['password'], $result->getPassword());
        $this->assertEquals($expectArray['state'], $result->getState());
        $this->assertEquals($expectArray['user_id'], $result->getId());
    }

    public function dataProviderTestExtractWithValidUserObject()
    {
        $createUserObject = function ($data) {
            $user = new \ZfcUserPixelpin\Entity\User;
            foreach ($data as $key => $value) {
                if ($key == 'user_id') {
                    $key='id';
                }
                $methode = 'set' . str_replace(" ", "", ucwords(str_replace("_", " ", $key)));
                call_user_func(array($user,$methode), $value);
            }
            return $user;
        };
        $return = array();
        $expectArray = array();

        $buffer = array(
            'username' => 'zfcuser',
            'email' => 'Zfc User',
            'display_name' => 'ZfcUserPixelpin',
            'password' => 'ZfcUserPixelpinPassword',
            'state' => 1,
            'user_id' => 1
        );

        $return[]=array($createUserObject($buffer), $buffer);

        /**
         * @see https://github.com/ZF-Commons/ZfcUserPixelpin/pull/421
         */
        $buffer = array(
            'username' => 'zfcuser',
            'email' => 'Zfc User',
            'display_name' => 'ZfcUserPixelpin',
            'password' => 'ZfcUserPixelpinPassword',
            'state' => 1
        );

        $return[]=array($createUserObject($buffer), $buffer);

        return $return;
    }
}
