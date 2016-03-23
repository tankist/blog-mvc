<?php

use Phalcon\Acl\Adapter\Memory as Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource as AclResource;

$acl = new Acl();

$acl->addRole(new Role('guest'));
$acl->addRole(new Role('user'), 'guest');

$acl->addResource(new AclResource('index'), ['index']);
$acl->addResource(new AclResource('auth'), ['signUp', 'signUpPost', 'signIn', 'signInPost']);

$acl->allow('user', '*', '*');
$acl->allow('*', 'auth', '*');
$acl->allow('*', 'index', 'index');

return $acl;