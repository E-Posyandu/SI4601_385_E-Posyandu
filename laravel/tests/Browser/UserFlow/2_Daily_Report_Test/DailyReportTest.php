<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DailyReportTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_user_can_create_report(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
                    ->click('@buttondailyreport')
                    ->click('@tambahreport');
        });
    }
}
