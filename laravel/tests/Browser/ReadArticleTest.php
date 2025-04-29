<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReadArticleTest extends DuskTestCase
{
    public function testViewArticleDetail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'admin123')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->pause(500)
                    ->visit('/artikel')
                    ->assertSee('Artikel & Edukasi')
                    ->clickLink('Lihat')
                    ->pause(500)
                    ->assertPathIs('/artikel/*')
                    ->assertSee('Detail Artikel');
        });
    }
}
