ZfcUserPixelpin
=======

Created by Evan Coury and the ZF-Commons team
Modified by Callum Brankin at PixelPin

Modifications
------------

Zfc User has been modified to include additional user data fields in the database. Zfc User is used by [PixelPin Auth](https://github.com/PixelPinPlugins/PixelPin-Auth).

Introduction
------------

ZfcUserPixelpin is a user registration and authentication module for Zend Framework 2.
Out of the box, ZfcUserPixelpin works with Zend\Db, however alternative storage adapter
modules are available (see below). ZfcUserPixelpin provides the foundations for adding
user authentication and registration to your ZF2 site. It is designed to be very
simple and easy to extend.

More information and examples are available on the [ZfcUser Wiki](https://github.com/ZF-Commons/ZfcUser/wiki)

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [PixelPin-ZFC-Base](https://github.com/PixelPinPlugins/PixelPin-ZFC-Base) (latest master).

Features / Goals
----------------

* Authenticate via username, email, or both (can opt out of the concept of
  username and use strictly email) [COMPLETE]
* User registration [COMPLETE]
* Forms protected against CSRF [COMPLETE]
* Out-of-the-box support for Doctrine2 _and_ Zend\Db [COMPLETE]
* Support for additional authentication mechanisms via PixelPin
