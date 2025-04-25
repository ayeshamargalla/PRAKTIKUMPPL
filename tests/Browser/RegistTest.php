<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testRegistration(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //mengunjungi halaman web dengan route “/”
                    ->assertSee('Modul 3') //memastikan teks 'Modul 3' ada di halaman
                    ->clickLink('Register') //mengklik link dengan teks 'Register'
                    ->assertPathIs('/register') //memastikan bahwa path sekarang adalah '/register'
                    ->screenshot('register-form') //mengambil screenshot dari form pendaftaran
                    ->type('name', 'Ayesha') //mengetikkan 'Ayesha' pada input dengan nama 'name'
                    ->type('email', 'ayeshamp03'.time().'@gmail.com') //mengetikkan email unik dengan menambahkan timestamp
                    ->type('password', '1234567') //mengetikkan password '1234567'
                    ->type('password_confirmation', '1234567') //mengetikkan konfirmasi password '1234567'
                    ->press('button[type="submit"]') //menekan tombol submit
                    ->assertPathIs('/dashboard') //memastikan path setelah submit adalah '/dashboard'
                    ->screenshot('registration-success'); //mengambil screenshot setelah pendaftaran berhasil
        });
    }
}