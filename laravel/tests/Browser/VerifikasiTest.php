<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VerifikasiTest extends DuskTestCase
{
    /**
     * Test menyetujui akun.
     */
    public function testMenyetujuiAkun(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verifikasi-akun')
                    ->pause(1000)
                    ->click('@dropdown-toggle')
                    ->pause(500)
                    ->click('@approve-button')
                    ->pause(1000)
                    ->assertSee('Disetujui');
        });
    }

    /**
     * Test menolak akun.
     */
    public function testMenolakAkun(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verifikasi-akun')
                    ->pause(1000)
                    ->click('@dropdown-toggle')
                    ->pause(500)
                    ->click('@reject-button')
                    ->pause(1000)
                    ->assertSee('Ditolak');
        });
    }

    /**
     * Test melihat detail akun.
     */
    public function testMelihatDetailAkun(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verifikasi-akun')
                    ->pause(1000)
                    ->click('@dropdown-toggle')
                    ->pause(500)
                    ->click('@view-button')
                    ->pause(1000)
                    ->assertPathBeginsWith('/verifikasi-akun/')
                    ->assertSee('Detail Akun Balita');
        });
    }

    /**
     * Test tombol kembali dari halaman detail.
     */
    public function testTombolKembaliDariDetail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verifikasi-akun')
                    ->pause(1000)
                    ->click('@dropdown-toggle')
                    ->pause(500)
                    ->click('@view-button')
                    ->pause(1000)
                    ->click('a.btn-light') // klik tombol kembali
                    ->pause(1000)
                    ->assertPathIs('/verifikasi-akun'); // pastikan kembali ke index
        });
    }

    /**
     * Test fitur search akun.
     */
    public function testFiturSearchAkun(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verifikasi-akun')
            ->type('@search-input', 'Nama Balita')
            ->press('@search-button')
            ->pause(1000)
            ->assertSee('Nama Balita');
        });
    }
}
