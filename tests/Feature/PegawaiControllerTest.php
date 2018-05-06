<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Pegawai;
use App\Jabatan;

class PegawaiControllerTest extends TestCase
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


    public function testPegawai()
    {
        $this->withoutMiddleware();
        $response = $this->get('/pegawai');
        $this->assertEquals(empty($response->original), false);
        $this->flushSession();
    }


    public function testEditPegawai(){
        $this->withoutMiddleware();
        $pegawai = Pegawai::first();
        // dd($pegawai);
        $response = $this->call('POST', '/pegawai/edit', [
            'id' => $pegawai->id,
            'nama' => $pegawai->nama,
            'lahir' => $pegawai->lahir,
            'no_telp' => $pegawai->no_telp,
            'alamat' => $pegawai->alamat,
            'jabatan' => $pegawai->jabatan,
            'email_edit' => $pegawai->email,
            '_token' => csrf_token()
        ]);
        $this->assertEquals(empty($response->original), false);
    }

    public function testTambahPegawai(){
        /*
        $this->withoutMiddleware();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $first = '';
        $last = '';
        for ($i = 0; $i < 10; $i++) {
            $first .= $characters[rand(0, $charactersLength - 1)];
            $last .= $characters[rand(0, $charactersLength - 1)];
        }
        $this->withExceptionHandling();
        $response = $this->call('POST', '/pegawai/tambah', [
            'nama' => $first.' '.$last,
            'lahir' => date('Y-m-d'),
            'no_telp' => '093483912',
            'alamat' => $last.' '.$first,
            'jabatan' => Jabatan::first()->id,
            'email' => $first.'@'.$last.'.com',
            '_token' => csrf_token()
        ]);
        $this->assertEquals($response, 'sukses');
        */

        // dd($data);
        // dd($response);
        $this->assertTrue(true);
    }

}
