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
     * Main index action
     * @param integer $code
     * @param string $error
     */
    public function indexAction($code, $error = '')
    {
        $this->view->setVar('code', $code);
        $this->view->setVar('error', $error);
    }
}
