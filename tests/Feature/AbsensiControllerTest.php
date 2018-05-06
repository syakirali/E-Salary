<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Pegawai;

class AbsensiControllerTest extends TestCase
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

    public function testKehadiranPegawai() {
        $this->withoutMiddleware();
        $pegawai = Pegawai::all()->first();
        $response = $this->get('/absensi/'.$pegawai->id);
        $response->assertStatus(200);
    }

    public function testKehadiran(){
        $this->withoutMiddleware();
        $response = $this->get('/kehadiran');
        $response->assertStatus(200);
    }
}
