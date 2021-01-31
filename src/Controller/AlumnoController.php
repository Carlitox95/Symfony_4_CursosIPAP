<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use App\Form\AlumnoType;
use App\Entity\Alumno;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class AlumnoController extends AbstractController
{
    /**
    * @Route("/alumnos", name="alumnos")
    */
    public function index(): Response
    {
     //Obtengo el Entity Manager
     $em=$this->getDoctrine()->getManager();

     //Obtengo el repositorio de los Alumnos
     $alumnos=$em->getRepository(Alumno::class)->findAll();
       
     return $this->render('Alumno/index.html.twig', ['alumnos' => $alumnos]);
    }

    /**
    * @Route("/alumnos/ver/{id}", name="ver")
    */
    public function verAlumno($id): Response
    {
     //Obtengo el EntityManager
     $entityManager=$this->getDoctrine()->getManager();
    
     //Obtengo el alumno seleccionado
     $alumno=$entityManager->getRepository(Alumno::class)->find($id);        

     return $this->render('Alumno/ver.html.twig',['alumno' => $alumno]);
    }
    
    /**
    * @Route("/alumnos/nuevo", name="alumnonuevo")
    */
    public function nuevoAlumno(Request $request): Response
    {
     //Defino un nuevo Alumno
     $alumno = new Alumno();

     //Defino el Formulario
     $form = $this->createForm(AlumnoType::class, $alumno);

     //Si se envia el formulario , existe un request
     $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
         //Obtengo el alumno del formulario
         $alumno = $form->getData();

         //Obtengo el EntityManager
         $entityManager = $this->getDoctrine()->getManager();

         //Le doy persistencia al alumno nuevo
         $entityManager->persist($alumno);

         //Asiento los cambios en la base de datos
         $entityManager->flush();

         //Redirecciono al listado de alumno
         return $this->redirectToRoute('alumnos');
        }

        return $this->render('Alumno/nuevo.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
    * @Route("/alumnos/editar/{id}", name="editaralumno")
    */
    public function editarAlumno($id,Request $request): Response
    {
      //Obtengo el EntityManager
     $entityManager=$this->getDoctrine()->getManager();
    
     //Obtengo el alumno seleccionado
     $alumno=$entityManager->getRepository(Alumno::class)->find($id);   

     //Defino el Formulario
     $form = $this->createForm(AlumnoType::class, $alumno);

     //Si se envia el formulario , existe un request
     $form->handleRequest($request);
     
       if ($form->isSubmitted() && $form->isValid()) {
         //Obtengo el alumno del formulario
         $alumno = $form->getData();

         //Obtengo el EntityManager
         $entityManager = $this->getDoctrine()->getManager();

         //Le doy persistencia al alumno nuevo
         $entityManager->persist($alumno);

         //Asiento los cambios en la base de datos
         $entityManager->flush();

         //Redirecciono al listado de alumno
         return $this->redirectToRoute('alumnos');
        }
      
        return $this->render('Alumno/editar.html.twig', [
         'form' => $form->createView(),
         'alumno' => $alumno,
        ]);

    }


     /**
    * @Route("/alumnos/borrar/{id}", name="veralumno")
    */
    public function borrarAlumno($id): Response
    {
     //Obtengo el EntityManager
     $entityManager=$this->getDoctrine()->getManager();
    
     //Obtengo el alumno seleccionado
     $alumno=$entityManager->getRepository(Alumno::class)->find($id);        
     
     //Elimino el Alumno seleccionado
     $entityManager->remove($alumno);

     //Asiento los cambios en la Base de Datos
     $entityManager->flush();

     //Redirecciono al listado de alumno
     return $this->redirectToRoute('alumnos');
    }
  

}
