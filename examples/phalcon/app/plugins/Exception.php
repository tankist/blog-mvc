<?php

namespace Plugin;

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\User\Plugin;

/**
 * Class Exception
 * @package Plugin
 */
class Exception extends Plugin
{

    /**
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @param \Exception $e
     * @return bool
     */
    public function beforeException(Event $event, Dispatcher $dispatcher, \Exception $e)
    {
        $this->response->setStatusCode($e->getCode() ?: 500, $e->getMessage() ?: 'Application error');
        $dispatcher->forward([
            'namespace' => 'Controller',
            'controller' => 'error',
            'action' => 'index',
            'params' => [
                0 => $e->getCode(),
                1 => $e->getMessage(),
            ],
        ]);
        return false;
    }
}
