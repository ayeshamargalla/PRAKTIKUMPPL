<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //mengunjungi halaman login
                    ->type('email', 'ayeshamp03@gmail.com') //mengetikkan email 'ayeshamp03@gmail.com'
                    ->type('password', '1234567') //mengetikkan password '1234567'
                    ->press('button[type="submit"]')  //menekan tombol submit
                    ->visit('/notes') //mengunjungi halaman daftar notes
                    ->assertSee('Edit Praktikum PPL') //memastikan teks 'Edit Praktikum PPL' ada di halaman
                    ->clickLink('Edit Praktikum PPL') //mengklik link dengan teks 'Edit Praktikum PPL'
                    ->assertPathIs('/note/1')  //memastikan bahwa path sekarang adalah '/note/1'
                    ->assertSee('Edit Praktikum PPL') //memastikan bahwa judul note yang tepat ditampilkan
                    ->assertSee('Edit kesekian kalinya!') //memastikan bahwa deskripsi note yang tepat ditampilkan
                    ->screenshot('view-note-success'); //mengambil screenshot setelah melihat detail note
        });
    }
}
