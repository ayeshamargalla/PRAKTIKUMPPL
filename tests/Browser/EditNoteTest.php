<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testEditNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //mengunjungi halaman login
                    ->type('email', 'ayeshamp03@gmail.com') //mengetikkan email 'ayeshamp03@gmail.com'
                    ->type('password', '1234567') //mengetikkan password '1234567'
                    ->press('button[type="submit"]')  //menekan tombol submit
                    ->assertPathIs('/dashboard') //memastikan setelah login berhasil, path berubah ke '/dashboard'
                    ->visit('/notes') //mengunjungi halaman notes
                    ->assertSee('Praktikum PPL') //memastikan teks 'Praktikum PPL' ada pada halaman
                    ->click('a[href^="/edit-note-page/1"]') //mengklik link dengan href yang dimulai dengan "/edit-note-page/1" untuk mengedit note
                    ->assertPathIs('/edit-note-page/1')  //memastikan bahwa setelah mengklik, halaman yang dibuka adalah '/edit-note-page/1'
                    ->screenshot('note-detail-page') //mengambil screenshot halaman detail note
                    ->type('title', 'Edit Praktikum PPL') //mengetikkan judul baru 'Edit Praktikum PPL' untuk menggantikan judul lama
                    ->type('description', ' Edit kesekian kalinya!') //mengetikkan deskripsi baru untuk menggantikan deskripsi lama
                    ->press('button[type="submit"]')  //menekan tombol submit untuk mengupdate note
                    ->assertSee('Note has been updated') //memastikan bahwa pesan 'Note has been updated' muncul setelah update berhasil
                    ->screenshot('edit-note-success'); //mengambil screenshot setelah berhasil mengedit note
        });
    }
}
