<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class CrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $route =  [
          'Management-Data/barang',
          'Management-Data/kategori-barang',
          'Management-Data/satuan-unit',
          'Management-Data/gudang',
          'Management-Data/pemasok',
          'Management-Data/pajak',
          'Management-Data/coa-master',
          'Management-Data/coa-type',

        ];
        foreach ($route as $r) {
                # code...
            $response = $this->get($r);
            $response->assertSeeText('');

        } 
        $response->assertSeeText('Dashboard');
        $response = $this->get('Management-Data/barang');
        
    }

    public function testDashboard()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
