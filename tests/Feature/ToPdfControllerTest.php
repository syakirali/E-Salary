<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Pegawai;

class ToPdfControllerTest extends TestCase
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

    public function testCetakGaji(){
        $this->withoutMiddleware();
        $pegawai = Pegawai::all()->first();
        $response = $this->get('/pegawai/CetakSlipGaji/'.$pegawai->id);
        $response->assertStatus(200);
    }
}
