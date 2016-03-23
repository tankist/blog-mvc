<?php

use Phalcon\Acl\Adapter\Memory as Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource as AclResource;

$acl = new Acl();

$acl->addRole(new Role('guest'));
$acl->addRole(new Role('user'), 'guest');

$acl->addResource(new AclResource('index'));
$acl->addResource(new AclResource('auth'));

$acl->allow('user', '*', '*');
$acl->allow('*', 'auth', '*');

return $acl;