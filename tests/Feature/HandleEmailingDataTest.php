<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\MovingCostInquiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HandleEmailingDataTest extends TestCase
{
    /**
     * @test
     */
    public function users_can_visit_the_calculator_page()
    {
        $this->get('/calculator')
            ->assertStatus(200);
    }
    /**
     * @test
     */
    public function calculator_data_is_mailed_on_submission()
    {
        Mail::fake();

        $this->postJson('/calculator', ['userData' =>
            [
                'anrede' => 'Herr',
                'vorname' => 'John',
                'nachname' => 'Doe',
                'telefon' => '016283123211',
                'email' => 'johndoe@example.com',
                'date' => '2021-08-04',
                'kostentraeger' => 'Selbst',
                'bemerkungen' => 'Meine Bemerkungen.',
                'von_strasse' => 'Meinestr. 74',
                'von_ort' => 'Karlsruhe',
                'von_etage' => 4,
                'von_groesse' => 27,
                'von_fahrstuhl' => '5-8 Personen',
                'von_postleitzahl' => 76133,
                'von_land' => 'Baden-Wuerttemberg',
                'von_raume' => 2,
                'von_tragestrecke' => 30,
                'von_gebaudeart' => 'reihenhaus',
                'nach_strasse' => 'Deinestr. 22',
                'nach_ort' => 'Bonn',
                'nach_etage' => 1,
                'nach_groesse' => 44,
                'nach_fahrstuhl' => 'nicht vorhanden',
                'nach_postleitzahl' => 91777,
                'nach_land' => 'Nordrein-Westfalen',
                'nach_raume' => 2,
                'nach_tragestrecke' => 15,
                'nach_gebaudeart' => 'mehrfamilienhaus'
            ]
        ]);

        Mail::assertQueued(MovingCostInquiry::class);
    }
}
