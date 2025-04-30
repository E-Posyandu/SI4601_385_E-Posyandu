<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteReportTest extends DuskTestCase
{
    public function testDeleteReport(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/DataBalita') 
                    ->clickLink('Lihat Detail') 
                    ->pause(1000) 
                    ->press('Delete') 
                    ->pause(500);
        });
    }
}
