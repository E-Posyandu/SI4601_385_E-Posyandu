<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VerifikasiTest extends DuskTestCase
{
    public function testVerifikasiAkun(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verifikasi-akun')
                    ->pause(1000)
                    ->click('@dropdown-toggle') // klik titik tiga
                    ->pause(500)
                    ->click('@approve-button') // klik 'Setujui'
                    ->pause(1000)
                    ->assertSee('Disetujui'); // pastikan ada tulisan status 'Disetujui'
        
        });
    }
}
