<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'ayeshamp03@gmail.com') //mengisi email
                    ->type('password', '1234567') //mengisi password
                    ->press('button[type="submit"]')  //menekan tombol login
                    ->assertPathIs('/dashboard') //memastikan path berubah ke dashboard setelah login
                    ->screenshot('logged-in');  //screenshot setelah login berhasil
                    
            $browser->click('#click-dropdown') //mengklik dropdown yang berisi link logout
                    ->clickLink('Log Out')  //mengklik link logout
                    ->assertSee('Enterprise')  //memastikan kita diarahkan kembali ke halaman login setelah logout
                    ->screenshot('logged-out');  //mengambil screenshot setelah logout
        });
    }
}
