<?php

namespace ZfcUserPixelpin\Entity;

interface UserInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id);

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername();

    /**
     * Set username.
     *
     * @param string $username
     * @return UserInterface
     */
    public function setUsername($username);

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email.
     *
     * @param string $email
     * @return UserInterface
     */
    public function setEmail($email);

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDisplayName();

    /**
     * Set displayName.
     *
     * @param string $displayName
     * @return UserInterface
     */
    public function setDisplayName($displayName);

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set firstName.
     *
     * @param string $firstName
     * @return UserInterface
     */
    public function setFirstName($firstName);

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set lastName.
     *
     * @param string $lastName
     * @return UserInterface
     */
    public function setLastName($lastName);

    /**
     * Get nickname.
     *
     * @return string
     */
    public function getNickName();

    /**
     * Set nickname.
     *
     * @param string $nickname
     * @return UserInterface
     */
    public function setNickName($nickname);

    /**
     * Get gender.
     *
     * @return string
     */
    public function getGender();

    /**
     * Set gender.
     *
     * @param string $gender
     * @return UserInterface
     */
    public function setGender($gender);

    /**
     * Get birthdate.
     *
     * @return string
     */
    public function getBirthdate();

    /**
     * Set birthdate.
     *
     * @param string $birthdate
     * @return UserInterface
     */
    public function setBirthdate($birthdate);

    /**
     * Get phoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber();

    /**
     * Set phoneNumber.
     *
     * @param string $phoneNumber
     * @return UserInterface
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress();

    /**
     * Set address.
     *
     * @param string $address
     * @return UserInterface
     */
    public function setAddress($address);

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set country.
     *
     * @param string $country
     * @return UserInterface
     */
    public function setCountry($country);

    /**
     * Get region.
     *
     * @return string
     */
    public function getRegion();

    /**
     * Set region.
     *
     * @param string $region
     * @return UserInterface
     */
    public function setRegion($region);

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity();

    /**
     * Set city.
     *
     * @param string $city
     * @return UserInterface
     */
    public function setCity($city);

    /**
     * Get zip.
     *
     * @return string
     */
    public function getZip();

    /**
     * Set zip.
     *
     * @param string $zip
     * @return UserInterface
     */
    public function setZip($Zip);

    /**
     * Get password.
     *
     * @return string password
     */
    public function getPassword();

    /**
     * Set password.
     *
     * @param string $password
     * @return UserInterface
     */
    public function setPassword($password);

    /**
     * Get state.
     *
     * @return int
     */
    public function getState();

    /**
     * Set state.
     *
     * @param int $state
     * @return UserInterface
     */
    public function setState($state);
}
