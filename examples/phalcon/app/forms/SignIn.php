<?php

namespace Form;

use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

/**
 * Class SignIn
 * @package Form
 */
class SignIn extends Form
{

    /**
     * @return $this
     */
    public function initialize()
    {
        $this->add(new Email('email'));

        $this->add(new Password('password'));

        return $this;
    }
}
