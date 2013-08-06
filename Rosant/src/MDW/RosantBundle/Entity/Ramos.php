<?php

namespace MDW\RosantBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ramos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\RosantBundle\Entity\RamosRepository")
 */
class Ramos 
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
     * @var integer
     *
     * @ORM\Column(name="codigo", type="integer")
     */
      private  $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ramo", type="string", length=255)
     */
      private $ramo;


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
     * Set codigo
     *
     * @param integer $codigo
     * @return Ramos
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set ramo
     *
     * @param string $ramo
     * @return Ramos
     */
    public function setRamo($ramo)
    {
        $this->ramo = $ramo;
    
        return $this;
    }

    /**
     * Get ramo
     *
     * @return string 
     */
    public function getRamo()
    {
        return $this->ramo;
    }
    
    
     public function __toString(){
     return $this->ramo;
        }
        
       
    /**
     * @ORM\OneToMany(targetEntity="Polizas", mappedBy="ramos")
     */
    protected $polizas;

    public function __construct()
    {
        $this->polizas = new ArrayCollection();
    }
    
     
        
        
        
}
