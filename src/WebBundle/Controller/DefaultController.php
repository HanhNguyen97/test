<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
     /**
     * @Route("/", name="web")
     */
    public function indexAction()
    {

       
        return $this->render('WebBundle:Default:index.html.twig');
    }
}
