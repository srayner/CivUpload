<?php

namespace CivUpload\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UploadController extends AbstractActionController
{
    public function uploadAction()
    { 
        // Params from ckeditor.
        $funcNum = $_GET['CKEditorFuncNum'] ;
        $CKEditor = $_GET['CKEditor'] ;
        $langCode = $_GET['langCode'] ;
        
        // Check the $_FILES array.
        $tmpFile = $_FILES['upload']['tmp_name'];
        $info = pathinfo($_FILES['upload']['name']);
        $ext = strtolower($info['extension']);
        
        // If extension indicates an image, then save the file.
        if (($ext == 'jpg') or ($ext == 'gif') or ($ext == 'png'))
        {
           $url = '/uploads/' . $this->saveImage($tmpFile, $ext);
        } 

        // Usually you will only assign something here if the file could not be uploaded.
        $message = '';
        
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        return $this->response; // Dissables the layout.
    }
    
    private function saveImage($tmpFile, $type)
    {
        $filename = 'img' . uniqid() . '.' . $type;
        rename($tmpFile, './public/uploads/' . $filename);
        return $filename; 
    }
}