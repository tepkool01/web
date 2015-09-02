<?php
namespace Application\AsyncController;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Request;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return $this->redirect()->toUrl('/');
    }
    public function mailAction()
    {
        return $this->redirect()->toUrl('/');
    }
}
