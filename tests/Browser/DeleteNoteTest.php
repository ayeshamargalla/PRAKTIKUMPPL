<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testDeleteNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //mengunjungi halaman login
                    ->type('email', 'ayeshamp03@gmail.com') //mengetikkan email 'ayeshamp03@gmail.com'
                    ->type('password', '1234567') //mengetikkan password '1234567'
                    ->press('button[type="submit"]')  //menekan tombol submit untuk login
                    ->assertPathIs('/dashboard') //memastikan setelah login berhasil, path berubah ke '/dashboard'
                    ->visit('/notes') //mengunjungi halaman daftar notes
                    ->assertSee('Praktikum PPL') //memastikan teks 'Praktikum PPL' ada di halaman notes
                    ->click('button[id^="delete-"]') //mengklik tombol delete dengan id yang dimulai dengan 'delete-'
                    ->assertPathIs('/notes') //memastikan setelah tombol delete ditekan, path tetap di halaman '/notes'
                    ->assertSee('Note has been deleted') //memastikan bahwa pesan 'Note has been deleted' muncul setelah note dihapus
                    ->assertDontSee('Edit Praktikum PPL') //memastikan bahwa note 'Praktikum PPL' tidak lagi ada di halaman notes
                    ->screenshot('delete-note-success'); //mengambil screenshot setelah note berhasil dihapus
        });
    }
}
