<?php

namespace Controller;

/**
 * Class ErrorController
 *
 * @package Controller
 */
class ErrorController extends Controller
{

    /**
     * Initialize error controller
     */
    public function initialize()
    {
        $this->view->setLayout('error');
    }

    /**
     * Main index action
     * @param string $error
     */
    public function indexAction($error = '')
    {
        $this->view->setVar('code', $error);
    }
}
