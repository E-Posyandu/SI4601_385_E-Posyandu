<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PosyanduTest extends DuskTestCase
{
    /**
     * Test login with valid credentials.
     */
    public function testvalidposyandu(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posyandu')
                    ->click('@tambah-posyandu')
                    ->assertPathIs('/posyandu/create')
                    ->type('nama_posyandu', 'Posyandu Sehat Jaya')
                    ->type('alamat_posyandu', 'Jln Sukaasih II')
                    ->select('id_admin', '1')
                    ->press('Simpan');
        });
    }

    public function testinvalidposyandu(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posyandu')
                    ->click('@tambah-posyandu')
                    ->assertPathIs('/posyandu/create')
                    ->type('nama_posyandu', 'Posyandu Sukaasih Sukarasa')
                    ->select('id_admin', '1')
                    ->press('Simpan');
        });
    }

    public function testeditdposyandu(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posyandu')
                    ->click('@edit-posyandu')
                    ->assertPathIs('/posyandu/1/edit')
                    ->type('alamat_posyandu', 'Jln Padasuka Mawar No 1')
                    ->press('Update')
                    ;
        });
    }
    public function testdeletedposyandu(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posyandu')
                    ->press('@delete-posyandu-1')
                    ->acceptDialog()
                    ->pause(1000)
                    ->assertDontSee('Posyandu Mawar Sehat');
        });
    }
}
