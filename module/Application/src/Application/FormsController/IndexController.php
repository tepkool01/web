<?php
namespace Application\FormsController;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Request;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /** @var Request $request */
        $request = $this->getRequest();
        $test = $request->getQuery('test');

        return $this->redirect()->toUrl('/');
    }
    public function mailAction()
    {
        return $this->redirect('/');
    }
}
