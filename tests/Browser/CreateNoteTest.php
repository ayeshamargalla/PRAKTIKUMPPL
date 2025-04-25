<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //mengunjungi halaman login
                    ->type('email', 'ayeshamp03@gmail.com') //mengetikkan email 'ayeshamp03@gmail.com'
                    ->type('password', '1234567') //mengetikkan password '1234567'
                    ->press('button[type="submit"]')  //menekan tombol submit
                    ->assertPathIs('/dashboard') //memastikan setelah login berhasil, path berubah ke '/dashboard'
                    ->visit('/notes') //mengunjungi halaman notes
                    ->click('a[href="/create-note"]') //mengklik link dengan href '/create-note'
                    ->type('title', 'Praktikum PPL'.time()) //mengetikkan title dengan nama 'Praktikum PPL' diikuti dengan timestamp untuk membuatnya unik
                    ->type('description', 'Ini test Create Note untuk Praktikum') //mengetikkan deskripsi untuk note
                    ->press('button[type="submit"]') //menekan tombol submit untuk membuat note
                    ->assertSee('new note has been created') //memastikan bahwa pesan 'new note has been created' muncul setelah pembuatan note
                    ->screenshot('create-note-success'); //mengambil screenshot setelah note berhasil dibuat
        });
    }
}
