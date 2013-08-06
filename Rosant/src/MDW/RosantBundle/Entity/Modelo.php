<?php

namespace MDW\RosantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Modelo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\RosantBundle\Entity\ModeloRepository")
 */
class Modelo
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
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="modelo")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     */
    private $marcas;

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
     * @return Modelo
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
     
    public function setMarcas($marcas)
    {
       
        $this->marcas = $marcas;
    
        return $this;
    }
    
    public function getMarcas()
    {
        return $this->marcas;
    }
    
     public function getAgentes()
    {
        return $this->agentes;
    }
    
     /**
     * @ORM\OneToMany(targetEntity="Vehiculos", mappedBy="modelo")
     */
    protected $vehiculos;
    
      /**
     * @ORM\OneToMany(targetEntity="Polizas", mappedBy="modelo")
     */
    protected $polizas;

    
    
    public function __construct()
    {
        $this->vehiculos = new ArrayCollection();
        $this->polizas = new ArrayCollection();
        
    }
}
