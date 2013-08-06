<?php

namespace MDW\RosantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Polizas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\RosantBundle\Entity\PolizasRepository")
 */
class Polizas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255)
     */
    protected $numero;

   

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=255)
     */
    protected $cliente;

   
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="agente", type="string", length=255)
//     */
//   protected $agente;

    /**
     * @var string
     *
     * @ORM\Column(name="capitalAsegurado", type="string", length=255)
     */
    protected $capitalAsegurado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaPago", type="date")
     */
  protected$fechaPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vigenciaDesde", type="date")
     */
   protected $vigenciaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vigenciaHasta", type="date")
     */
   protected $vigenciaHasta;


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
     * Set numero
     *
     * @param string $numero
     * @return Polizas
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

   

    /**
     * Set cliente
     *
     * @param string $cliente
     * @return Polizas
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    

    /**
     * Set agente
     *
     * @param string $agente
     * @return Polizas
     */
//    public function setAgente($agente)
//    {
//        $this->agente = $agente;
//    
//        return $this;
//    }
//
//    /**
//     * Get agente
//     *
//     * @return string 
//     */
//    public function getAgente()
//    {
//        return $this->agente;
//    }

    /**
     * Set capitalAsegurado
     *
     * @param string $capitalAsegurado
     * @return Polizas
     */
    public function setCapitalAsegurado($capitalAsegurado)
    {
        $this->capitalAsegurado = $capitalAsegurado;
    
        return $this;
    }

    /**
     * Get capitalAsegurado
     *
     * @return string 
     */
    public function getCapitalAsegurado()
    {
        return $this->capitalAsegurado;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     * @return Polizas
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;
    
        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime 
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set vigenciaDesde
     *
     * @param \DateTime $vigenciaDesde
     * @return Polizas
     */
    public function setVigenciaDesde($vigenciaDesde)
    {
        $this->vigenciaDesde = $vigenciaDesde;
    
        return $this;
    }

    /**
     * Get vigenciaDesde
     *
     * @return \DateTime 
     */
    public function getVigenciaDesde()
    {
        return $this->vigenciaDesde;
    }

    /**
     * Set vigenciaHasta
     *
     * @param \DateTime $vigenciaHasta
     * @return Polizas
     */
    public function setVigenciaHasta($vigenciaHasta)
    {
        $this->vigenciaHasta = $vigenciaHasta;
    
        return $this;
    }

    /**
     * Get vigenciaHasta
     *
     * @return \DateTime 
     */
    public function getVigenciaHasta()
    {
        return $this->vigenciaHasta;
    }
    
      public function setAseguradoras($aseguradoras)
    {
       
        $this->aseguradoras = $aseguradoras;
    
        return $this;
    }
    
     public function getAseguradoras()
    {
        return $this->aseguradoras;
    }
    
      public function setRamos($ramos)
    {
       
        $this->ramos = $ramos;
    
        return $this;
    }
    
     public function getRamos()
    {
        return $this->ramos;
    }
    
      public function setAgentes($agentes)
    {
       
        $this->agentes = $agentes;
    
        return $this;
    }
    
     public function getAgentes()
    {
        return $this->agentes;
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
      public function setModelo($modelo)
    {
       
        $this->modelo = $modelo;
    
        return $this;
    }
    
     public function getModelo()
    {
        return $this->modelo;
    }
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Aseguradoras", inversedBy="polizas")
     * @ORM\JoinColumn(name="aseguradora_id", referencedColumnName="id")
     */
    private $aseguradoras;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ramos", inversedBy="polizas")
     * @ORM\JoinColumn(name="ramo_id", referencedColumnName="id")
     */
    private $ramos;
     
    /**
     * @ORM\ManyToOne(targetEntity="Agente", inversedBy="polizas")
     * @ORM\JoinColumn(name="agente_id", referencedColumnName="id")
     */
    private $agentes;
    
 
      /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="polizas")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     */
     private $marcas;
    
     /**
     * @ORM\ManyToOne(targetEntity="Modelo", inversedBy="polizas")
     * @ORM\JoinColumn(name="modelo_id", referencedColumnName="id")
     */
    private $modelo;
     
     
     public function __toString(){
        return $this->cliente;
     }
    
    
    
    
    
    
   
}
