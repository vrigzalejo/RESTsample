<?php

/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 5/12/15
 * Time: 4:31 AM
 */
class Rest_Controller_Plugin_RestAuth extends Zend_Controller_Plugin_Abstract
{

    public function preDispatch( Zend_Controller_Request_Abstract $request )
    {
        // curl 127.0.0.1:3000/article -v
        // curl -H "apikey: secret" 127.0.0.1:3000/article -v
        $apiKey = $request->getHeader( 'apikey' );

        if( $apiKey != 'secret' ) {
            $this->getResponse()
                ->setHttpResponseCode( 403 )
                ->appendBody( "Invalid API Key\n" );

            $request->setModuleName( 'default' )
                ->setControllerName( 'error' )
                ->setActionName( 'access' )
                ->setDispatched( true );
        }
    }

}