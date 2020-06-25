<?php

namespace AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AuthBundle\Model\AdminQuery;
use AuthBundle\Model\Admin;
use AuthBundle\Model\UserQuery;
use AuthBundle\Model\User;

class RegisterController extends Controller
{
    /**
     * @Route("/", name="loginpage")
     */
    public function indexAction(Request $request)
    {
        
       
     return $this->render('AuthBundle:Default:index.html.twig');
        // return $this->render('default/index.html.twig', [
        //     'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        // ]);
    }
}