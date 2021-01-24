<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', 
        	[
             'controller_name' => 'HomeController',
             'titulo' => "Prueba de Symfony de Carlos",
             'variable' => 0,
            ]);
    }
    
    /**
     * @Route("/home/vista1", name="vista1")
     */
    public function vista1(): Response
    {
        return $this->render('home/vista1.html.twig');
    }

    /**
     * @Route("/home/vista2", name="vista2")
     */
    public function vista2(): Response
    {
        return $this->render('home/vista2.html.twig');
    }


}