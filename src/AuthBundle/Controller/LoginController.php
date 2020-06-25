<?php

namespace AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AuthBundle\Model\AdminQuery;
use AuthBundle\Model\Admin;

class LoginController extends Controller
{
    /**
     * @Route("/", name="loginpage")
     */
    public function indexAction(Request $request)
    {
        //dump($request);die;
        echo 1;
        if($request->server->get('REQUEST_METHOD')=='POST'){
        //if($request->isMethod('POST')){
       //  dump($request);die;
        //  echo 2;
        // if ( !empty($request->request->all())){
        //     echo 2;
        // }
            $errors=array();
    		$acc=trim($request->get('acc_admin'));
            // $admin= AdminQuery::create()
            // ->filterByAccount($request->request->all()['account'])
            // ->filterByPassword($request->request->all()['password'])
            // ->findOne();
             $admin= AdminQuery::create()->find();
             dump($acc);
           dump($admin);
           die;
        }
       
     return $this->render('AuthBundle:Default:index.html.twig');
        // return $this->render('default/index.html.twig', [
        //     'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        // ]);
    }
}