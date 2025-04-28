<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DownloadReportTest extends DuskTestCase
{
    public function testDownloadReport(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/DataBalita') 
                    ->clickLink('Lihat Detail') 
                    ->pause(1000) 
                    ->click('Download') 
                    ->pause(2000); 
        });
    }
}
