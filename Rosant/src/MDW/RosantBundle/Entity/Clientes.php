<?php

namespace MDW\RosantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
 use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
 
 
 


/**
 * Clientes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\RosantBundle\Entity\ClientesRepository")
 */
class Clientes 
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
     * @Assert\NotNull()
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Assert\NotNull(message="*Campo Obligatorio") 
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @Assert\MinLength(10)
     * @ORM\Column(name="cedula", type="string", length=255)
     */
    private $cedula;

    /**
     * @var \DateTime
     *
     * @Assert\NotNull()
     * @ORM\Column(name="fecha_nacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="sexo", type="string", length=255)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion", type="string", length=255, nullable=true)
     */
    private $profesion;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=255, nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_empresa", type="string", length=255, nullable=true)
     */
    private $direccionEmpresa;

    /**
     * @var string
     * @Assert\MaxLength(10)
     * @ORM\Column(name="telefono_empresa", type="string", length=255, nullable=true)
     */
    private $telefonoEmpresa;

    /**
     * @var string
     * @ORM\Column(name="cargo_empresa", type="string", length=255, nullable=true)
     */
    private $cargoEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_domicilio", type="string", length=255, nullable=true)
     */
    private $direccionDomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia_direccion", type="text", nullable=true)
     */
    private $referenciaDireccion;

    /**
     * @var string
     * @Assert\MaxLength(9)
     * @ORM\Column(name="telefono_fijo", type="string", length=255, nullable=true)
     */
    private $telefonoFijo;

    /**
     * @var string
     * @Assert\MaxLength(10)
     * @ORM\Column(name="telefono_movil", type="string", length=255, nullable=true)
     */
    private $telefonoMovil;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="zona", type="string", length=255, nullable=true)
     */
    private $zona;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="referido", type="string", length=255, nullable=true)
     */
    private $referido;

    /**
     * @var string
     *
     * @ORM\Column(name="agente", type="string", length=255, nullable=true)
     */
    private $agente;

    /**
     * @var string
     *
     * @ORM\Column(name="contratante", type="string", length=255, nullable=true)
     */
    private $contratante;

    /**
     * @var \DateTime
     * @Assert\NotNull()
     * @ORM\Column(name="fecha_registro", type="date")
     */
    private $fechaRegistro;


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
     * @return Clientes
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

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Clientes
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Clientes
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Clientes
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Clientes
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set profesion
     *
     * @param string $profesion
     * @return Clientes
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;
    
        return $this;
    }

    /**
     * Get profesion
     *
     * @return string 
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Clientes
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    
        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set direccionEmpresa
     *
     * @param string $direccionEmpresa
     * @return Clientes
     */
    public function setDireccionEmpresa($direccionEmpresa)
    {
        $this->direccionEmpresa = $direccionEmpresa;
    
        return $this;
    }

    /**
     * Get direccionEmpresa
     *
     * @return string 
     */
    public function getDireccionEmpresa()
    {
        return $this->direccionEmpresa;
    }

    /**
     * Set telefonoEmpresa
     *
     * @param string $telefonoEmpresa
     * @return Clientes
     */
    public function setTelefonoEmpresa($telefonoEmpresa)
    {
        $this->telefonoEmpresa = $telefonoEmpresa;
    
        return $this;
    }

    /**
     * Get telefonoEmpresa
     *
     * @return string 
     */
    public function getTelefonoEmpresa()
    {
        return $this->telefonoEmpresa;
    }

    /**
     * Set cargoEmpresa
     *
     * @param string $cargoEmpresa
     * @return Clientes
     */
    public function setCargoEmpresa($cargoEmpresa)
    {
        $this->cargoEmpresa = $cargoEmpresa;
    
        return $this;
    }

    /**
     * Get cargoEmpresa
     *
     * @return string 
     */
    public function getCargoEmpresa()
    {
        return $this->cargoEmpresa;
    }

    /**
     * Set direccionDomicilio
     *
     * @param string $direccionDomicilio
     * @return Clientes
     */
    public function setDireccionDomicilio($direccionDomicilio)
    {
        $this->direccionDomicilio = $direccionDomicilio;
    
        return $this;
    }

    /**
     * Get direccionDomicilio
     *
     * @return string 
     */
    public function getDireccionDomicilio()
    {
        return $this->direccionDomicilio;
    }

    /**
     * Set referenciaDireccion
     *
     * @param string $referenciaDireccion
     * @return Clientes
     */
    public function setReferenciaDireccion($referenciaDireccion)
    {
        $this->referenciaDireccion = $referenciaDireccion;
    
        return $this;
    }

    /**
     * Get referenciaDireccion
     *
     * @return string 
     */
    public function getReferenciaDireccion()
    {
        return $this->referenciaDireccion;
    }

    /**
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     * @return Clientes
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
    
        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string 
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set telefonoMovil
     *
     * @param string $telefonoMovil
     * @return Clientes
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;
    
        return $this;
    }

    /**
     * Get telefonoMovil
     *
     * @return string 
     */
    public function getTelefonoMovil()
    {
        return $this->telefonoMovil;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Clientes
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set zona
     *
     * @param string $zona
     * @return Clientes
     */
    public function setZona($zona)
    {
        $this->zona = $zona;
    
        return $this;
    }

    /**
     * Get zona
     *
     * @return string 
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Clientes
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Clientes
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set referido
     *
     * @param string $referido
     * @return Clientes
     */
    public function setReferido($referido)
    {
        $this->referido = $referido;
    
        return $this;
    }

    /**
     * Get referido
     *
     * @return string 
     */
    public function getReferido()
    {
        return $this->referido;
    }

    /**
     * Set agente
     *
     * @param string $agente
     * @return Clientes
     */
    public function setAgente($agente)
    {
        $this->agente = $agente;
    
        return $this;
    }

    /**
     * Get agente
     *
     * @return string 
     */
    public function getAgente()
    {
        return $this->agente;
    }

    /**
     * Set contratante
     *
     * @param string $contratante
     * @return Clientes
     */
    public function setContratante($contratante)
    {
        $this->contratante = $contratante;
    
        return $this;
    }

    /**
     * Get contratante
     *
     * @return string 
     */
    public function getContratante()
    {
        return $this->contratante;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Clientes
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }
    
   

    
    public function isCedulaValida( ExecutionContextInterface $context)
{
        $opcion=$this->getTipo();
      if($opcion=="Natural") {
          
       
        $strCedula=$this->getCedula();
        if(is_null($strCedula) || empty($strCedula)){//compruebo si que el numero enviado es vacio o null
            echo "Por Favor Ingrese la Cedula";
        }else{//caso contrario sigo el proceso
        if(is_numeric($strCedula)){
            $total_caracteres=strlen($strCedula);// se suma el total de caracteres
        if($total_caracteres==10){//compruebo que tenga 10 digitos la cedula
            $nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
        if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
            $ult_digito=substr($strCedula, -1,1);//extraigo el ultimo digito de la cedula
        //extraigo los valores pares//
        $valor2=substr($strCedula, 1, 1);
        $valor4=substr($strCedula, 3, 1);
        $valor6=substr($strCedula, 5, 1);
        $valor8=substr($strCedula, 7, 1);
        $suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
        //extraigo los valores impares//
        $valor1=substr($strCedula, 0, 1);
        $valor1=($valor1 * 2);
        if($valor1>9){ $valor1=($valor1 - 9); }
            $valor3=substr($strCedula, 2, 1);
            $valor3=($valor3 * 2);
        if($valor3>9){ $valor3=($valor3 - 9); }
            $valor5=substr($strCedula, 4, 1);
            $valor5=($valor5 * 2);
        if($valor5>9){ $valor5=($valor5 - 9); }
            $valor7=substr($strCedula, 6, 1);
            $valor7=($valor7 * 2);
        if($valor7>9){ $valor7=($valor7 - 9); }
            $valor9=substr($strCedula, 8, 1);
            $valor9=($valor9 * 2);
        if($valor9>9){ $valor9=($valor9 - 9); }

        $suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
        $suma=($suma_pares + $suma_impares);
        $dis=substr($suma, 0,1);//extraigo el primer numero de la suma
        $dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
        $digito=($dis - $suma);
        if($digito==10){ $digito='0'; }//si la suma nos resulta 10, el decimo digito es cero
        if ($digito==$ult_digito){//comparo los digitos final y ultimo

        }else{
            $context->addViolationAt('Cedula', 'La cédula ingresada es inválida!', array(), null);
        }
        }else{
            $context->addViolationAt('Cedula', 'La cédula ingresada es inválida!', array(), null);
        }


        }
        }else{
                $context->addViolationAt('Cedula', 'La cédula ingresada es inválida!', array(), null);
        }
        }
}
        }


           
//             public function isContratanteValido( ExecutionContextInterface $context)
//        {
//             
//             $contratante=$this->getCedula();
//             $em = $this->getDoctrine()->getManager();
//             $entity = $em->getRepository('MDWRosantBundle:Clientes')->find($contratante);
//
//        if (!$entity) {
//             $context->addViolationAt('Cedula', 'El contratante No Existe!', array(), null);
//        }
//        }
     
        
    }
