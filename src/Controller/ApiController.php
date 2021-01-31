<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Alumno;
use App\Entity\Docente;

class ApiController extends AbstractController
{
    /**
     * @Route("/ObtenerAlumnos", name="ObtenerAlumnos")
     */
    public function indexAlumnos(): Response
    {
       //Obtengo el Entity Manager
       $em = $this ->getDoctrine()->getManager();

       //Obtengo el repositorio de los Docentes
       $alumnos=$em-> getRepository(Alumno::class)->findAll();
       
       return $this->json(['Alumnos' => $alumnos]);

    }
    
    /**
     * @Route("/ObtenerDocentes", name="ObtenerDocentes")
     */
    public function indexDocentes(): Response
    {
       //Obtengo el Entity Manager
       $em = $this ->getDoctrine()->getManager();

       //Obtengo el repositorio de los Docentes
       $docentes=$em-> getRepository(Docente::class)->findAll();
       
       return $this->json(['Docentes' => $docentes]);  
    }
   


}
