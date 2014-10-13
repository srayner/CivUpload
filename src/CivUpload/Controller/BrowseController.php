<?php

namespace CivUpload\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BrowseController extends AbstractActionController
{
    public function indexAction()
    {
        $funcNum = $_GET['CKEditorFuncNum'] ;
        return array(
            'files' => array_diff(scandir('./public/uploads'), array('..', '.')),
            'funcNum' => $funcNum
        );
    }
}