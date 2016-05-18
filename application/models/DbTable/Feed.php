<?php

class Application_Model_DbTable_Feed extends Zend_Db_Table_Abstract
{

    protected $_name = 'feeds';

    function addlink($data)
	{

		$row = $this->createRow();
		$row->path = $data['path'];
	

		return $row->save();
	}

	function listlinks()
    {
    	
		return $this->fetchAll()->toArray();
	}
	
    function getlinkById($id)
	{
		return $this->find($id)->toArray();
	}	
		



}

