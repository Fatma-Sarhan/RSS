<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initSession()
	{
		Zend_Session::start();
		$session = new Zend_Session_Namespace( 'Zend_Auth' );
		// $session->setExpirationSeconds( 1800 );
	}

	protected function _initRequest() 
	{
		$this->bootstrap('FrontController');
		$front = $this->getResource('FrontController');
		$request = new Zend_Controller_Request_Http();
		$front->setRequest($request);
	}

	protected function _initPlaceholders()
	{
		$this->bootstrap('View');
		$view = $this->getResource('View');
		$view->doctype('XHTML1_STRICT');
		//Meta
		$view->headMeta()->appendName('keywords', 'framework, PHP')->appendHttpEquiv('Content-Type','text/html;charset=utf-8');
		// Set the initial title and separator:
		$view->headTitle('RSS ')->setSeparator(' :: ');
		// Set the initial stylesheet:
		$view->headLink()->prependStylesheet($view->baseUrl().'/css/bootstrap.min.css');
		// Set the initial JS to load:
		$view->headScript()->prependFile($view->baseUrl().'/js/bootstrap.min.js');
		$view->headScript()->prependFile($view->baseUrl().'/js/bootstrap.js');


		$view->headScript()->prependFile($view->baseUrl().'/js/jquery-1.12.0.min.js');
		$view->headScript()->prependFile($view->baseUrl().'/js/jquery-1.11.3.min.js');
		$view->headScript()->prependFile($view->baseUrl().'/js/jquery-1.11.0.min.js');
		
	}


}



