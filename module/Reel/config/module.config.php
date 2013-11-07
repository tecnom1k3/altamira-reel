<?php
return array(
    'router' => array(
        'routes' => array(
            'Reel' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/reel',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Reel\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id[/:container]][.js][.css]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                                'container' => '[a-zA-Z0-9]+',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Reel\Controller\Index' => 'Reel\Controller\IndexController',
            'Reel\Controller\Get' => 'Reel\Controller\GetController',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'Reel   ' => __DIR__ . '/../view',
        ),
    ),
        
        'doctrine' => array(
                'driver' => array(
                        'application_entities' => array(
                                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                                'cache' => 'array',
                                'paths' => array(__DIR__ . '/../src/Reel/Entity')
                        ),
        
                        'orm_default' => array(
                                'drivers' => array(
                                        'Reel\Entity' => 'application_entities'
                                )
                        ))),
);

