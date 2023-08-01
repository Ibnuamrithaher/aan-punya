<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        //Category
        \App\Models\Category::create([
            'kode_category' => 'C1',
            'nama_category' => 'Lama Bekerja',
            'atribut' => 'Benefit',
            'nilai_bobot' => 0.3,
        ]);
        \App\Models\Category::create([
            'kode_category' => 'C2',
            'nama_category' => 'Pendidikan',
            'atribut' => 'Benefit',
            'nilai_bobot' => 0.1,
        ]);
        \App\Models\Category::create([
            'kode_category' => 'C3',
            'nama_category' => 'Kehadiran',
            'atribut' => 'Benefit',
            'nilai_bobot' => 0.2,
        ]);
        \App\Models\Category::create([
            'kode_category' => 'C4',
            'nama_category' => 'Kinerja',
            'atribut' => 'Benefit',
            'nilai_bobot' => 0.4,
        ]);


        //Cripts category 1
        \App\Models\Crips::create([
            'category_id' => '1',
            'nama_crips' => '0,5 Tahun',
            'nilai' => 0.15,
        ]);
        \App\Models\Crips::create([
            'category_id' => '1',
            'nama_crips' => '0,5 - 1 Tahun',
            'nilai' => 0.25,
        ]);
        \App\Models\Crips::create([
            'category_id' => '1',
            'nama_crips' => '1 - 3 Tahun',
            'nilai' => 0.5,
        ]);
        \App\Models\Crips::create([
            'category_id' => '1',
            'nama_crips' => '3 - 4 Tahun',
            'nilai' => 0.75,
        ]);
        \App\Models\Crips::create([
            'category_id' => '1',
            'nama_crips' => 'Di Atas 4 Tahun',
            'nilai' => 1,
        ]);


        //cripst category 2
        \App\Models\Crips::create([
            'category_id' => '2',
            'nama_crips' => 'SD',
            'nilai' => 0.15,
        ]);
        \App\Models\Crips::create([
            'category_id' => '2',
            'nama_crips' => 'SMP',
            'nilai' => 0.25,
        ]);
        \App\Models\Crips::create([
            'category_id' => '2',
            'nama_crips' => 'SMA',
            'nilai' => 0.5,
        ]);
        \App\Models\Crips::create([
            'category_id' => '2',
            'nama_crips' => 'S1',
            'nilai' => 0.75,
        ]);
        \App\Models\Crips::create([
            'category_id' => '2',
            'nama_crips' => 'S2',
            'nilai' => 1,
        ]);

        
        //cripst category 3
        \App\Models\Crips::create([
            'category_id' => '3',
            'nama_crips' => 'TB',
            'nilai' => 0.15,
        ]);
        \App\Models\Crips::create([
            'category_id' => '3',
            'nama_crips' => 'KB',
            'nilai' => 0.25,
        ]);
        \App\Models\Crips::create([
            'category_id' => '3',
            'nama_crips' => 'C',
            'nilai' => 0.5,
        ]);
        \App\Models\Crips::create([
            'category_id' => '3',
            'nama_crips' => 'B',
            'nilai' => 0.75,
        ]);
        \App\Models\Crips::create([
            'category_id' => '3',
            'nama_crips' => 'SB',
            'nilai' => 1,
        ]);


        //cripst category 4
         \App\Models\Crips::create([
            'category_id' => '4',
            'nama_crips' => 'TB',
            'nilai' => 0.15,
        ]);
        \App\Models\Crips::create([
            'category_id' => '4',
            'nama_crips' => 'KB',
            'nilai' => 0.25,
        ]);
        \App\Models\Crips::create([
            'category_id' => '4',
            'nama_crips' => 'C',
            'nilai' => 0.5,
        ]);
        \App\Models\Crips::create([
            'category_id' => '4',
            'nama_crips' => 'B',
            'nilai' => 0.75,
        ]);
        \App\Models\Crips::create([
            'category_id' => '4',
            'nama_crips' => 'SB',
            'nilai' => 1,
        ]);


        //alternatif
        $alternatif1 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A1',
            'nama_alternatif' => 'Hamdana',
        ]);
        $alternatif1->crips()->attach([5,7,13,18], ['hasil' => 0,]);

        $alternatif2 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A2',
            'nama_alternatif' => 'Hafifah Maharani',
        ]);
        $alternatif2->crips()->attach([3,8,13,19], ['hasil' => 0,]);

        $alternatif3 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A3',
            'nama_alternatif' => 'Feni',
        ]);
        $alternatif3->crips()->attach([4,7,13,19], ['hasil' => 0,]);

        $alternatif4 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A4',
            'nama_alternatif' => 'Sri Wulandari',
        ]);
        $alternatif4->crips()->attach([3,8,14,19], ['hasil' => 0,]);

        $alternatif5 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A5',
            'nama_alternatif' => 'Salma Meilani',
        ]);
        $alternatif5->crips()->attach([1,8,13,19], ['hasil' => 0,]);

        $alternatif6 =\App\Models\Alternatif::create([
            'kode_alternatif' => 'A6',
            'nama_alternatif' => 'Nurfitriani',
        ]);
        $alternatif6->crips()->attach([5,8,14,20], ['hasil' => 0,]);

        $alternatif7 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A7',
            'nama_alternatif' => 'Siti Aminah',
        ]);
        $alternatif7->crips()->attach([1,7,14,18], ['hasil' => 0,]);

        $alternatif8 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A8',
            'nama_alternatif' => 'Mila',
        ]);
        $alternatif8->crips()->attach([2,7,11,18], ['hasil' => 0,]);

        $alternatif9 = \App\Models\Alternatif::create([
            'kode_alternatif' => 'A9',
            'nama_alternatif' => 'Sudirman',
        ]);
        $alternatif9->crips()->attach([3,7,13,19], ['hasil' => 0,]);

        $alternatif10 =\App\Models\Alternatif::create([
            'kode_alternatif' => 'A10',
            'nama_alternatif' => 'Andi Shalehati',
        ]);
        $alternatif10->crips()->attach([5,8,15,18], ['hasil' => 0,]);

        $alternatif11 =\App\Models\Alternatif::create([
            'kode_alternatif' => 'A11',
            'nama_alternatif' => 'Riska',
        ]);
        $alternatif11->crips()->attach([3,8,12,19], ['hasil' => 0,]);

        $alternatif12 =\App\Models\Alternatif::create([
            'kode_alternatif' => 'A12',
            'nama_alternatif' => 'Nurhafisah',
        ]);
        $alternatif12->crips()->attach([4,8,15,19], ['hasil' => 0,]);
    }
}
