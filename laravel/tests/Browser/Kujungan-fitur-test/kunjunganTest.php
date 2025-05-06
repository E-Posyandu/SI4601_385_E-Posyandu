<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class kunjunganTest extends DuskTestCase
{
    public function testSearchKunjungan(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/visited')
                    ->type('search', 'Alexander Yono') 
                    ->press('Cari')
                    ->assertSee('Alexander Yono'); 
        });
    }

    public function testeditdvisited(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/visited')
                    ->click('@edit-visited')
                    ->assertPathIs('/visited/2/edit')
                    ->type('berat_badan', '8.3')
                    ->press('Simpan Perubahan');
        });  
    }

    public function testdeletedvisited(): void
    {
         $this->browse(function (Browser $browser) {
             $browser->visit('/visited')
                     ->press('@delete-kunjungan-1')
                     ->acceptDialog()
                     ->pause(1000)
                     ->assertDontSee('Alexander Yono');
         });
    }

    
   
}
