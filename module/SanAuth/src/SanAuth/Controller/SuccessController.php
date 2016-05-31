<?php

//module/SanAuth/src/SanAuth/Controller/SuccessController.php
namespace SanAuth\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//*use Album\Controller\AlbumController;*//
 
class SuccessController extends AbstractActionController
{
    public function indexAction()
    {
        if (! $this->getServiceLocator()
                 ->get('AuthService')->hasIdentity()){
            return $this->redirect()->toRoute('login');
        }
         
        //*return new indexAction();*//
        return new ViewModel();        
            }
}
