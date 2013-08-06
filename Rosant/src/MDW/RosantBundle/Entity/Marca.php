<?php

namespace MDW\RosantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Marca
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\RosantBundle\Entity\MarcaRepository")
 */
class Marca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Vehiculos", mappedBy="marca")
     */
    protected $vehiculos;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Marca
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
     public function __toString(){
     return $this->nombre;
}

   

    public function __construct()
    {
        $this->vehiculos = new ArrayCollection();
        $this->modelos = new ArrayCollection();
        $this->polizas = new ArrayCollection();
       
        
    }
    
     /**
     * @ORM\OneToMany(targetEntity="Modelo", mappedBy="marca")
     */
    protected $modelos;
    
     /**
     * @ORM\OneToMany(targetEntity="Polizas", mappedBy="marca")
     */
    protected $polizas;

    
    
    
}
