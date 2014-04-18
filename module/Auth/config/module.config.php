<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Auth\Controller\Index' => 'Auth\Controller\IndexController'
        )
    ),
    
    'router' => array(
        'routes' => array(
            'Auth' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/auth[/][:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Auth\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'Auth' => __DIR__ . '/../view'
        )
    )
);