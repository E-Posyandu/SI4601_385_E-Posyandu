<?php

namespace Tests\Feature;

use App\Models\JadwalKegiatan;
use App\Models\PetugasKader;
use App\Models\Posyandu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JadwalKegiatanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_jadwal_index_page()
    {
        $response = $this->get(route('jadwal-kegiatan.index'));
        $response->assertStatus(200);
        $response->assertSee('Daftar Jadwal Kegiatan');
    }

    /** @test */
    public function user_can_create_a_jadwal()
    {
        $petugas = PetugasKader::factory()->create();
        $posyandu = Posyandu::factory()->create();

        $data = [
            'nama_kegiatan' => 'Pemeriksaan Balita',
            'jenis_kegiatan' => 'Imunisasi',
            'tanggal_kegiatan' => '2025-05-20',
            'id_petugas_kader' => $petugas->id_petugas_kader,
            'id_posyandu' => $posyandu->id_posyandu,
        ];

        $response = $this->post(route('jadwal-kegiatan.store'), $data);

        $response->assertRedirect(route('jadwal-kegiatan.index'));
        $this->assertDatabaseHas('jadwal_kegiatans', $data);
    }

    /** @test */
    public function user_can_view_detail_jadwal()
    {
        $jadwal = JadwalKegiatan::factory()->create();

        $response = $this->get(route('jadwal-kegiatan.show', $jadwal));
        $response->assertStatus(200);
        $response->assertSee($jadwal->nama_kegiatan);
    }

    /** @test */
    public function user_can_update_jadwal()
    {
        $jadwal = JadwalKegiatan::factory()->create();

        $updatedData = [
            'nama_kegiatan' => 'Updated Nama',
            'jenis_kegiatan' => 'Vaksin',
            'tanggal_kegiatan' => '2025-06-01',
            'id_petugas_kader' => $jadwal->id_petugas_kader,
            'id_posyandu' => $jadwal->id_posyandu,
        ];

        $response = $this->put(route('jadwal-kegiatan.update', $jadwal), $updatedData);
        $response->assertRedirect(route('jadwal-kegiatan.index'));

        $this->assertDatabaseHas('jadwal_kegiatans', $updatedData);
    }

    /** @test */
    public function user_can_delete_jadwal()
    {
        $jadwal = JadwalKegiatan::factory()->create();

        $response = $this->delete(route('jadwal-kegiatan.destroy', $jadwal));
        $response->assertRedirect(route('jadwal-kegiatan.index'));

        $this->assertDatabaseMissing('jadwal_kegiatans', [
            'id_jadwal' => $jadwal->id_jadwal,
        ]);
    }
}
