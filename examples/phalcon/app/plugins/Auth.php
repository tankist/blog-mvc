<?php

namespace Plugin;

use Model\User;
use Phalcon\Acl;
use Phalcon\Acl\Adapter\Memory as AclAdapter;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class Auth extends Plugin
{

    /**
     * @var Acl $acl
     */
    protected $acl;

    /**
     * @param AclAdapter $acl
     */
    public function __construct(AclAdapter $acl)
    {
        $this->acl = $acl;
    }

    /**
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $role = 'guest';
        if ($this->session->has('user_id')) {
            $userId = $this->session->get('user_id');
            if ($userId) {
                $user = User::findFirst($userId);
                if ($user instanceof User) {
                    $role = 'user';
                    $dispatcher->setParam('user', $user);
                }
            }
        }

        $controller = strtolower($dispatcher->getControllerName());
        $action = strtolower($dispatcher->getActionName());

        if (!$this->acl->isAllowed($role, $controller, $action)) {
            $this->session->set('__callback_url', $this->request->getServer('REQUEST_URI'));
            $dispatcher->forward([
                'controller' => 'auth',
                'action' => 'signIn',
            ]);
            return false;
        }
        return true;
    }
}
