<?php

return array(
    
    'router' => array(
        'routes' => array(
            'upload' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/upload',
                    'defaults' => array (
                        'controller' => 'CivUpload\Controller\Upload',
                        'action' => 'upload'
                    ),
                ),
            ),
            'browse'=> array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/browse',
                    'defaults' => array(
                        'controller' => 'CivUpload\Controller\Browse',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'CivUpload\Controller\Upload' => 'CivUpload\Controller\UploadController',
            'CivUpload\Controller\Browse' => 'CivUpload\Controller\BrowseController'
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(__DIR__ . '/../view')
    ),
    
    'civupload' => array(
        'folder' => '/public/upload'
    ),
);