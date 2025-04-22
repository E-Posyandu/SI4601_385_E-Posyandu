<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\balita;
use App\Models\orangtua;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BabyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_babies_list()
    {
        $response = $this->get(route('babies.index'));
        $response->assertStatus(200);
        $response->assertViewIs('babies');
    }

    public function test_can_create_baby()
    {
        $orangtua = orangtua::factory()->create();
        
        $babyData = [
            'nama_balita' => 'Test Baby',
            'tanggal_lahir' => '2023-01-01',
            'jenis_kelamin' => 'L',
            'golongan_darah' => 'A',
            'berat_badan' => 3.5,
            'tinggi_badan' => 50,
            'orangtua_id' => $orangtua->id,
            'id_vaksin' => 1,
            'id_vitamin' => 1,
            'username' => 'testbaby',
            'password' => 'password123'
        ];

        $response = $this->post(route('babies.store'), $babyData);
        $response->assertRedirect(route('babies.index'));
        $this->assertDatabaseHas('table_balita', ['nama_balita' => 'Test Baby']);
    }

    public function test_can_update_baby()
    {
        $baby = balita::factory()->create();
        
        $updatedData = [
            'nama_balita' => 'Updated Baby Name',
            'tanggal_lahir' => '2023-01-01',
            'jenis_kelamin' => 'L',
            'golongan_darah' => 'A',
            'berat_badan' => 4.0,
            'tinggi_badan' => 52,
            'orangtua_id' => $baby->orangtua_id,
            'id_vaksin' => $baby->id_vaksin,
            'id_vitamin' => $baby->id_vitamin,
            'username' => $baby->username,
            'password' => $baby->password
        ];

        $response = $this->put(route('babies.update', $baby->id), $updatedData);
        $response->assertRedirect(route('babies.index'));
        $this->assertDatabaseHas('table_balita', ['nama_balita' => 'Updated Baby Name']);
    }

    public function test_can_delete_baby()
    {
        $baby = balita::factory()->create();
        
        $response = $this->delete(route('babies.destroy', $baby->id));
        $response->assertRedirect(route('babies.index'));
        $this->assertDatabaseMissing('table_balita', ['id' => $baby->id]);
    }

    public function test_can_show_baby_details()
    {
        $baby = balita::factory()->create();
        
        $response = $this->get(route('babies.show', $baby->id));
        $response->assertStatus(200);
        $response->assertViewIs('show');
        $response->assertViewHas('baby');
    }
}