<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'SanAuth\Controller\Auth' => 'SanAuth\Controller\AuthController',
            'SanAuth\Controller\Success' => 'SanAuth\Controller\SuccessController',
            'SanAuth\Controller\Logout' => 'SanAuth\Controller\LogoutController',
                    ),
    ),
    'router' => array(
        'routes' => array(
             
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SanAuth\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'login',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'process' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
             
            'success' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/success',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SanAuth\Controller',
                        'controller'    => 'Success',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
        
            'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SanAuth\Controller',
                        'controller'    => 'Logout',
                        'action'        => 'logout',
                    ),
                ),
           ),
        ),
     ),   
        
                     
    'view_manager' => array(
        'template_path_stack' => array(
            'SanAuth' => __DIR__ . '/../view',
       ),
     ),
 );