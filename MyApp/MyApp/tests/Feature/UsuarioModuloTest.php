<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioModuloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mostrar_Usuario()
    {
       $this->get('/usuarios')->assertStatus(200)
       ->assertSee('Usuarios');

    }
    public function test_mostrar_detalle_Usuario()
    {
       $this->get('/usuarios/5')->assertStatus(200)
       ->assertSee('Se muestra al usuario: 5');

    }
    public function test_crear_Usuario_nuevo()
    {
       $this->get('/usuarios/5')->assertStatus(200)
       ->assertSee('Se muestra al usuario: 5');

    }
}
