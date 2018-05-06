<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class loginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testHalamanLogin(){
        $response = $this->get('/login');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testLogin(){
      $this->startSession();
      $response = $this->call('POST', '/login', [
          'username' => 'admin',
          'password' => 'adminadmin',
          '_token' => csrf_token()
      ]);
      $this->assertAuthenticated();
    }
}
