<?php
namespace App\Form;

use App\Entity\Alumno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class AlumnoType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder,array $options)
    {
     $builder        
        ->add('Nombre',TextType::class)
        ->add('Apellido',TextType::class)
        ->add('Legajo',TextType::class)
        ->add('save', SubmitType::class,array('label'=>'Nuevo Alumno'));
    }
}
