<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BienvenidaUsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBienvenidoUsuarioConNick()
    {
       $this->get('/saludo/julian/julianwei')
       ->assertStatus(200)->assertSee('Bienvenido usuario julian, tu apodo es julianwei');

    }

    public function testBienvenidoUsuarioSinNick()
    {
       $this->get('/saludo/julian/')
       ->assertStatus(200)->assertSee('Bienvenido usuario julian, no tienes apodo');
    }
}
