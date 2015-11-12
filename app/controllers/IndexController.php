<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    // access session in model:
    // $this->userId = $this->getDI()->getSession()->get('user-id');
    
    public function indexAction()
    {
        $response = new \Phalcon\Http\Response();
        
        return $response->redirect("poi");
    }
}