<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //mengunjungi halaman login
                    ->screenshot('login-debug') //mengambil screenshot dari halaman login untuk debugging
                    ->type('email', 'ayeshamp03@gmail.com') //mengetikkan email 'ayeshamp03@gmail.com' pada input dengan nama 'email'
                    ->type('password', '1234567') //mengetikkan password '1234567' pada input dengan nama 'password'
                    ->press('button[type="submit"]')  //menekan tombol submit dengan tipe 'submit'
                    ->assertPathIs('/dashboard');  //memastikan setelah login berhasil, path berubah ke '/dashboard'
        });
    }
}