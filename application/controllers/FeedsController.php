<?php

class FeedsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->model = new Application_Model_DbTable_Feed();
        $this->layout= $this->_helper->layout();

    }

    public function indexAction()
    {
        $result = array();
        $links = $this->model->listlinks(); 
        foreach ($links as  $link) 
        {
            $path = $link['path'];
            // echo $path ;
            $channel = new Zend_Feed_Rss($path);

            $result[] = $channel ;
            // var_dump($result);
            
        } 
		// $this->view->links = $links;
        $this->view->news = $result;


    }

    public function addAction()
    {
        $form = new Application_Form_Feed();
        

        if($this->getRequest()->isPost())
        {
				if($form->isValid($this->getRequest()->getParams()))
				{
					$data = $form->getValues();
					if ($this->model->addlink($data))
					$this->redirect('feeds');	
				}

		}
		$links = $this->model->listlinks();
		$this->view->links = $links;
        $this->view->form = $form;
    }

    public function listAction()
    {
        $id = $this->getRequest()->getParam('id');
        $link = $this->model->getlinkById($id);
        echo $link[0]['path'];
        $path = $link[0]['path'];
        $channel = new Zend_Feed_Rss($path);
        $this->view->channel = $channel;
    }


}





