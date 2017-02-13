<?php

namespace ZfcUserPixelpin\Entity;

class User implements UserInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var string
     */
    protected $birthdate;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $nickname;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $state;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username.
     *
     * @param string $username
     * @return UserInterface
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param string $email
     * @return UserInterface
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName.
     *
     * @param string $displayName
     * @return UserInterface
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     * @return UserInterface
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     * @return UserInterface
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get nickName.
     *
     * @return string
     */
    public function getNickName()
    {
        return $this->nickname;
    }

    /**
     * Set nickname.
     *
     * @param string $nickname
     * @return UserInterface
     */
    public function setNickName($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * Get gender.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set gender.
     *
     * @param string $gender
     * @return UserInterface
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Get birthdate.
     *
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set birthdate.
     *
     * @param string $birthdate
     * @return UserInterface
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * Get phoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneNumber.
     *
     * @param string $phoneNumber
     * @return UserInterface
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address.
     *
     * @param string $address
     * @return UserInterface
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country.
     *
     * @param string $country
     * @return UserInterface
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get region.
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set region.
     *
     * @param string $region
     * @return UserInterface
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city.
     *
     * @param string $city
     * @return UserInterface
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get zip.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set zip.
     *
     * @param string $zip
     * @return UserInterface
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string $password
     * @return UserInterface
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param int $state
     * @return UserInterface
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
}
