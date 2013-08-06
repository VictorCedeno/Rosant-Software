<?php

namespace MDW\RosantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehiculos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\RosantBundle\Entity\VehiculosRepository")
 */
class Vehiculos
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
     * @ORM\ManyToOne(targetEntity="Modelo", inversedBy="vehiculos")
     * @ORM\JoinColumn(name="modelo_id", referencedColumnName="id")
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;

     /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="vehiculos")
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
 
    public function setMarcas($marcas)
    {
       
        $this->marcas = $marcas;
    
        return $this;
    }
    
     public function getMarcas()
    {
        return $this->marcas;
    }
    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Vehiculos
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Vehiculos
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }
    
      
     public function __toString(){
        return $this->id;
     }
    
    
}
