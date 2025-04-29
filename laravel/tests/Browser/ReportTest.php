<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UploadReportTest extends DuskTestCase
{
    public function testUploadReportBayi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/report-perkembangan') // sesuaikan dengan URL upload kamu
                    ->select('id_balita', '1') // ID balita harus ada di database
                    ->type('tanggal', '2025-04-29') // tanggal sesuai field name
                    ->attach('file', __DIR__.'/files/sample_report.pdf') // file input pakai 'file' bukan 'file_path'
                    ->press('Kirim');
        });
    }
}
