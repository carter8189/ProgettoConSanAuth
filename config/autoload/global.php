<?php

//configurazione modificata per usare database multipli; il db è il primario, db1 e db2 sono opzionali//

return array(
    'db' => array(
        //this is for primary adapter....
        'driver'         => 'Pdo',
        'dsn'             => 'mysql:dbname=users;host=localhost',
        'driver_options'  => array(
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
         ),
         
        //other adapter when it needed...
        'adapters' => array(
             
            'db1' => array(
               'driver'         => 'Pdo',
               'dsn'             => 'mysql:dbname=album;host=localhost',
               'driver_options'  => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ),
            ),
            'db2' => array(
               'driver'         => 'Pdo',
               'dsn'             => 'mysql:dbname=zf2_test;host=localhost',
               'driver_options'  => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ),
            ),
             
        ),
    ),
    'service_manager' => array(
        // for primary db adapter that called
        // by $sm->get('Zend\Db\Adapter\Adapter')
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
        // to allow other adapter to be called by
        // $sm->get('db1') or $sm->get('db2') based on the adapters config.
        'abstract_factories' => array(
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        ),
    ),
);

/*return array(
     'db' => array(
         'driver'         => 'Pdo',
         'dsn'            => 'mysql:dbname=users;host=localhost',
         'driver_options' => array(
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
         ),
     ),
     'service_manager' => array(
         'factories' => array(
             'Zend\Db\Adapter\Adapter'
                     => 'Zend\Db\Adapter\AdapterServiceFactory',
         ),
     ),
 );*/
