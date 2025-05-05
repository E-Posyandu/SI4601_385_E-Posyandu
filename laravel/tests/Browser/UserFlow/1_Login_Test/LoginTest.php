<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_user_can_login_with_correct(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->click('@loginuserbutton')
                    ->assertPathIs('/user/login')
                    ->type('username', 'exnessgo')
                    ->type('password', 'exnessgo')
                    ->press('Login')
                    ->assertPathIs('/dashboard');
        });
    }

    public function test_user_can_login_with_incorrect(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->click('@loginuserbutton')
                    ->assertPathIs('/user/login')
                    ->type('username', 'falseuser')
                    ->type('password', 'falseuser')
                    ->press('Login')
                    ->assertSee('Username atau password salah.');
        });
    }
}