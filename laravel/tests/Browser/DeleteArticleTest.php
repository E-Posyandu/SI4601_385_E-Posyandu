<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteArticleTest extends DuskTestCase
{
    public function testDeleteArticle(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'admin123')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->pause(500)
                    ->visit('/artikel')
                    ->assertSee('Artikel & Edukasi')
                    ->click('@delete-button-1') // Using the dusk attribute we found in the blade file
                    ->acceptDialog() // This handles the JavaScript confirm() dialog
                    ->pause(500)
                    ->assertSee('Artikel & Edukasi'); // Verify we're still on the articles page after deletion
        });
    }
}
