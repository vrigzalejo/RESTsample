<?php

class ArticleController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->viewRenderer->setNoRender( true );
    }

    // curl 127.0.0.1:3000/article
    public function indexAction()
    {
        // action body
        $this->getResponse()->appendBody( "From indexAction() returning all articles" );
        // curl 127.0.0.1:3000/article -v
        $this->getResponse()->setHttpResponseCode( 200 )->appendBody( "all articles content" );

    }

    // curl 127.0.0.1:3000/article/1
    public function getAction()
    {
        // action body
        $this->getResponse()->appendBody( "From getAction() returning the requested article" );
        // curl 127.0.0.1:3000/article/20 -v
        $this->getResponse()->setHttpResponseCode(404)->appendBody("requested article 20 not found");
    }

    // curl -d "article=myarticle" 127.0.0.1:3000/article
    public function postAction()
    {
        $uri = Zend_Controller_Front::getInstance()->getRequest()->getRequestUri();
        // action body
        $this->getResponse()->appendBody( "From postAction() returning the requested article" );

        // curl -d "article=myarticle" 127.0.0.1:3000/article -v
        $this->getResponse()
            ->setHttpResponseCode(201)
            ->appendBody("\ncreated the article\n")
            ->appendBody($uri . "/5\n");
    }

    // curl -d "article=updatearticle" -X PUT 127.0.0.1:3000/article/1
    public function putAction()
    {
        // action body
        $this->getResponse()->appendBody( "From putAction() returning the requested article" );

    }

    // curl -X DELETE 127.0.0.1:3000/article/1
    public function deleteAction()
    {
        // action body
        $this->getResponse()->appendBody( "From deleteAction() returning the requested article" );
        // curl -X DELETE 127.0.0.1:3000/article/5 -v
        $this->getResponse()->setHttpResponseCode(204);
    }


}









