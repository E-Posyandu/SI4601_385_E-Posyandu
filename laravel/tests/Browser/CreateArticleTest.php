<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateArticleTest extends DuskTestCase
{
    public function testCreateNewArticle(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'admin123')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->pause(1000)
                    ->visit('/artikel')
                    ->clickLink('Tambah Artikel')
                    ->pause(2000)
                    ->type('judul', 'Judul Artikel Test')
                    ->pause(1000)
                    ->check('input[name="is_show"]')
                    ->pause(1000)
                    ->type('isi', 'Ini adalah konten artikel dari automated test. Artikel ini dibuat untuk testing fitur create article.')
                    ->press('Simpan');
        });
    }
}
