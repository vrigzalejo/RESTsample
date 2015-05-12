<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    // enable the rest route for the entire application.
    protected function _initRestRoute()
    {
        $this->bootstrap('frontController');
        $frontController = Zend_Controller_Front::getInstance();
        $restRoute = new Zend_Rest_Route($frontController);
        $frontController->getRouter()->addRoute('default', $restRoute);

    }
}

