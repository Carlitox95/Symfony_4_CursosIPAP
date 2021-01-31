<?php

namespace App\Entity;

use App\Repository\DocenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocenteRepository::class)
 */
class Docente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $legajo;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getLegajo(): ?string
    {
        return $this->legajo;
    }

    public function setLegajo(string $legajo): self
    {
        $this->legajo = $legajo;
        return $this;
    }


}
