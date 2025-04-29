<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArtikelTest extends DuskTestCase
{
    /** @test */
    public function user_can_create_new_artikel()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Sesuaikan dengan login-mu
            ]);

            $browser->loginAs($user)
                    ->visit(route('artikel.create'))
                    ->type('judul', 'Judul Artikel Test')
                    ->check('is_show')
                    ->type('isi', 'Ini adalah konten artikel test.')
                    ->press('Simpan')
                    ->assertPathIs(route('artikel.index'))
                    ->assertSee('Judul Artikel Test');
        });
    }

    /** @test */
    public function user_can_edit_artikel()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $artikel = \App\Models\Artikel::factory()->create([
                'judul' => 'Artikel Lama',
                'isi' => 'Isi lama',
                'is_show' => false,
                'author' => 'Admin',
            ]);

            $browser->loginAs($user)
                    ->visit(route('artikel.edit', ['id' => $artikel->id_artikel]))
                    ->type('judul', 'Artikel Baru')
                    ->type('content', 'Isi baru')
                    ->check('is_show')
                    ->press('Simpan')
                    ->assertPathIs(route('artikel.index'))
                    ->assertSee('Artikel Baru');
        });
    }

    /** @test */
    public function user_can_delete_artikel()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $artikel = \App\Models\Artikel::factory()->create([
                'judul' => 'Artikel Hapus',
                'author' => 'Admin',
            ]);

            $browser->loginAs($user)
                    ->visit(route('artikel.index'))
                    ->assertSee('Artikel Hapus')
                    ->press('@delete-button-' . $artikel->id_artikel)
                    ->assertDontSee('Artikel Hapus');
        });
    }
}
