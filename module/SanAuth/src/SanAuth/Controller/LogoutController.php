<?php

//module/SanAuth/src/SanAuth/Controller/LogoutController.php
namespace SanAuth\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
 
class LogoutController extends AbstractActionController
{
    protected $storage;
    protected $authservice;
     
    public function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()
                                      ->get('AuthService');
        }
         
        return $this->authservice;
    }
     
    public function getSessionStorage()
    {
        if (! $this->storage) {
            $this->storage = $this->getServiceLocator()
                                  ->get('SanAuth\Model\MyAuthStorage');
        }
         
        return $this->storage;
    }
    
public function logoutAction()
    {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();
        return $this->redirect()->toRoute('login');
                
        $this->flashmessenger()->addMessage("Hai effettuato il logout");
    }
}