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

More information and examples are available on the [ZfcUserPixelpin Wiki](https://github.com/ZF-Commons/ZfcUserPixelpin/wiki)

Storage Adapter Modules
-----------------------

By default, ZfcUserPixelpin ships with support for using Zend\Db for persisting users.
However, by installing an optional alternative storage adapter module, you can
take advantage of other methods of persisting users:

- [ZfcUserPixelpinDoctrineORM](https://github.com/ZF-Commons/ZfcUserPixelpinDoctrineORM) - Doctrine2 ORM
- [ZfcUserPixelpinDoctrineMongoODM](https://github.com/ZF-Commons/ZfcUserPixelpinDoctrineMongoODM) - Doctrine2 MongoDB ODM

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [PixelPinZFCBase](https://github.com/PixelPinPlugins/PixelPin-ZFC-Base) (latest master).

Features / Goals
----------------

* Authenticate via username, email, or both (can opt out of the concept of
  username and use strictly email) [COMPLETE]
* User registration [COMPLETE]
* Forms protected against CSRF [COMPLETE]
* Out-of-the-box support for Doctrine2 _and_ Zend\Db [COMPLETE]
* Support for additional authentication mechanisms via PixelPin
