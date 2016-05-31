<?php

namespace Album;
use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\MvcEvent;

class Module
{  
        /*
    public function onBootstrap(\Zend\EventManager\EventInterface $e)
{
                        
    $app = $e->getApplication();    
    $sm = $app->getServiceManager();
    $app->getEventManager()->attach(
        'route',
        function($e) {
            $app = $e->getApplication();
            $routeMatch = $e->getRouteMatch();
            $sm = $app->getServiceManager();
            $auth = $sm->get('AuthService');
            if (!$auth->hasIdentity() && 
            $routeMatch->getMatchedRouteName() != 'sanauth/login' &&  //queste sono le pagine a cui possono accede i non loggati (non so perche
            $routeMatch->getMatchedRouteName() != 'login' ) {
                $response = $e->getResponse();
                $response->getHeaders()->addHeaderLine(
                    'Location',
                    $e->getRouter()->assemble(
                            array(),
                            array('name' => 'login')
                    )
                );
                $response->setStatusCode(302);
                return $response;
              }
            },
            -100
     );
}
 * 
 */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' =>  function($sm) {
                    $tableGateway = $sm->get('AlbumTableGateway');
                    $table = new AlbumTable($tableGateway);
                    return $table;
                },
                'AlbumTableGateway' => function ($sm) {
                    //*$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');*//
                    $dbAdapter = $sm->get('db1');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    
}