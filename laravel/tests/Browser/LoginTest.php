<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Test login with valid credentials.
     */
    public function testLoginWithValidCredentials(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'admin123')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->pause(1000)
                    ->assertPathIs('/admin/dashboard');
        });
    }
}
