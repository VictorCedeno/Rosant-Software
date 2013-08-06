<?php

namespace MDW\RosantBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use MDW\RosantBundle\Entity\Clientes;
use MDW\RosantBundle\Controller\ClientesController;

class ClientesControllerTest extends WebTestCase
{
    
    public function testCompleteScenario()
    {
        // Valores de Entrada
        // Cedulas de Ejemplo : 0917914160 - 0922429261 - 1706240957
        $cedula = '0917914165'; // Asigno un Valor a la Cedula
        $nombre = 'Andrea';
        $email = 'petersonic1@hotmail.com';
        
        // Create a new client to browse the application
        $client = static::createClient();
        //$client->followRedirects();
        
        // LOGIN ----------------------------------------------------------------------------------------------
                            //Le digo al Test que se dirija, a la pagina de Login, debido que en Test no se redirije automaticamente
                            //como en un Browser 
                            $crawler = $client->request('GET', '/admin/login');
                            $form = $crawler->selectButton('Iniciar Sesión')->form(); // Preparo un Formulario, el cual se enviara cuando presione Boton Iniciar Sesion
                            // Lleno formulario con Valores de User y Password
                            $form['_username'] = 'jumarome';
                            $form['_password'] = 'juancho18';
                            $client->submit($form); // Envio Formulario
        // FIN DE LOGIN -----------------------------------------------------------------------------------------
        
// INICIO DE CREACION DE CLIENTE
        $crawler = $client->request('GET', '/clientes/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "No puede entrar a Formulario de Nuevo Cliente, debido a que no esta autenticado");
        
        // Verifico si la Cedula es Válida
        $this->assertEquals('Cedula Correcta', $this->validarCI($cedula), "Cedula No Válida");
        
        $form = $crawler->selectButton('Registrar')->form(array(
            'mdw_rosantbundle_clientestype[nombre]'  => $nombre,
            'mdw_rosantbundle_clientestype[apellido]'  => 'Arcentales',
            'mdw_rosantbundle_clientestype[cedula]'  => $cedula,
            'mdw_rosantbundle_clientestype[fechaNacimiento]'  => array('year' => '1995', 'month' => '11', 'day' => '11'),
            'mdw_rosantbundle_clientestype[profesion]'  => 'ar',
            'mdw_rosantbundle_clientestype[empresa]'  => 'Rosant',
            'mdw_rosantbundle_clientestype[direccionEmpresa]'  => 'Asdad',
            'mdw_rosantbundle_clientestype[telefonoEmpresa]'  => '065451212',
            'mdw_rosantbundle_clientestype[cargoEmpresa]'  => 'Doctor',
            'mdw_rosantbundle_clientestype[direccionDomicilio]'  => 'adas',
            'mdw_rosantbundle_clientestype[referenciaDireccion]'  => 'asasd',
            'mdw_rosantbundle_clientestype[telefonoFijo]'  => '2324554',
            'mdw_rosantbundle_clientestype[telefonoMovil]'  => '09878454',
            'mdw_rosantbundle_clientestype[email]'  => $email,
            'mdw_rosantbundle_clientestype[zona]'  => 'Norte',
            'mdw_rosantbundle_clientestype[region]'  => 'M',
            'mdw_rosantbundle_clientestype[tipo]'  => 'Natural',
            'mdw_rosantbundle_clientestype[referido]'  => 'M',
            'mdw_rosantbundle_clientestype[agente]'  => 'Elvira',
            'mdw_rosantbundle_clientestype[contratante]'  => 'M',
            'mdw_rosantbundle_clientestype[fechaRegistro]'  => array('year' => '2013', 'month' => '6', 'day' => '28'),           
        ));        
        $client->submit($form);
        
        
        //Verifico si salio Alerta de Email ya Existente
        //$this->assertGreaterThan(0, $crawler->filter('html:contains("Este email ya esta en uso")')->count(), 'Mail ya existe en Base de Datos');
        
        //Verifico si salio Alerta de Cedula ya Existente
        //$this->assertGreaterThan(0, $crawler->filter('html:contains("Ya existe un cliente con esta cédula")')->count(), 'Cedula ya existe en Base de Datos');
        
        // Reviso si el Cliente fue Creado
        $crawler = $client->request('GET', '/clientes/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /clientes/");
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Andrea")')->count(), 'El Cliente no ha sido registrado debido a alguna validacion');

        
        /*
        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Editar')->link());

        $form = $crawler->selectButton('Editar')->form(array(
            'mdw_rosantbundle_clientestype[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());*/
    }

    function validarCI($strCedula)
{



        $nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
        if($nro_region>=1 && $nro_region<=24)
            {
                    // compruebo a que region pertenece esta cedula//
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
                    if($valor1>9){ $valor1=($valor1 - 9); }else{ }
                    $valor3=substr($strCedula, 2, 1);
                    $valor3=($valor3 * 2);
                    if($valor3>9){ $valor3=($valor3 - 9); }else{ }
                    $valor5=substr($strCedula, 4, 1);
                    $valor5=($valor5 * 2);
                    if($valor5>9){ $valor5=($valor5 - 9); }else{ }
                    $valor7=substr($strCedula, 6, 1);
                    $valor7=($valor7 * 2);
                    if($valor7>9){ $valor7=($valor7 - 9); }else{ }
                    $valor9=substr($strCedula, 8, 1);
                    $valor9=($valor9 * 2);
                    if($valor9>9){ $valor9=($valor9 - 9); }else{ }

                    $suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
                    $suma=($suma_pares + $suma_impares);
                    $dis=substr($suma, 0,1);//extraigo el primer numero de la suma
                    $dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
                    $digito=($dis - $suma);
                    if($digito==10){ $digito='0'; }//si la suma nos resulta 10, el decimo digito es cero
                    if ($digito==$ult_digito){//comparo los digitos final y ultimo
                            return "Cedula Correcta";
                    }else{
                            return "Cedula Incorrecta";
                    }
        }
        else{
                return "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
        }

        }
}
