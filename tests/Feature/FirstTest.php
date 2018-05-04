<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FirstTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_Inicio()
    {
        //Having
        //When
        $this->visit("/")
        	//Then
        	->see("Inicio");
    }
    public function test_Encuesta()
    {
    	//When
    	$this->visit("encuestas")
    		//Then
    		->see("Gestión de encuestas");
    }
    public function test_Carga()
    {
    	//When
    	$this->visit("carga")
    		//Then
    		->see("Cargar Base");
    }
    public function test_EncuestaServicio()
    {
    	//When
    	$this->visit("encuestas/servicio")
    		//Then
    		->see("Encuestas de servicio");
    }
}
