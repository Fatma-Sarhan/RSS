<?php

class Application_Form_Feed extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */



        $path = new Zend_Form_Element_Text('path');
		$path->setRequired();
    	// $path->setAttribs(array(
     //            'rows'        => '2',
     //            'class'       => 'txt_meta'
     //    ));

		$path->setLabel('New RSS');
		$path->addValidator(new Zend_Validate_Db_NoRecordExists(
	    array(
	        'table' => 'feeds',
	        'field' => 'path'
	   		 )
		));
		$path->setAttrib('class', 'form-control');
		
	 	$id = new Zend_Form_Element_Hidden('id');

		$submit = new Zend_Form_Element_Submit('Submit');

		$submit->setAttrib('class', 'btn btn-primary');


		$this->addElements(array($id,$path,$submit));
    

    }


}

