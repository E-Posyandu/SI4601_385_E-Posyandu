<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewArticleTest extends DuskTestCase
{
    public function testViewArticleList(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'admin123')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->pause(500)
                    ->visit('/artikel')
                    ->assertSee('Artikel & Edukasi');
        });
    }
}
