<?php

namespace MDW\RosantBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PolizasControllerTest extends WebTestCase
{

    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();
        
        // Variables para Testing
        $numero = '1111'; // Probado con 0 - Numero grande , Floats , y Texto 
        $aseguradora= '12'; //possible values: , 12, 17, 18, 19, 20
        $agente = '1'; // possible values: , 1, 2, 3, 4
        $ramos = '1'; // possible values: , 1, 2, 3, 4, 5, 6, 7
        $capital = '40000456461561654'; //
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
        
        // INICIO DE CREACION DE Poliza
        $crawler = $client->request('GET', '/polizas/new/70/Pedro/Arcentales');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Pagina para crear Polizas no disponible para este usuario");
        

        $form = $crawler->selectButton('Registrar')->form(array(
            'mdw_rosantbundle_polizastype[numero]'  => $numero,
            'mdw_rosantbundle_polizastype[ramos]'  => $ramos,
            'mdw_rosantbundle_polizastype[capitalAsegurado]'  => $capital,
            'mdw_rosantbundle_polizastype[aseguradoras]' => $aseguradora,
            'mdw_rosantbundle_polizastype[agentes]'  => $agente,
            'mdw_rosantbundle_polizastype[fechaPago]'  => array('year' => '2015', 'month' => '11', 'day' => '11'),
            'mdw_rosantbundle_polizastype[vigenciaDesde]'  => array('year' => '2015', 'month' => '11', 'day' => '11'),
            'mdw_rosantbundle_polizastype[vigenciaHasta]'  => array('year' => '2015', 'month' => '11', 'day' => '11'),      
        ));        
        $client->submit($form);
        
        // Reviso si el Cliente fue Creado
        $crawler = $client->request('GET', '/polizas/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /clientes/");
        $this->assertGreaterThan(0, $crawler->filter('td:contains("1111")')->count(), 'El Cliente no ha sido registrado debido a alguna validacion');

    }
    
}