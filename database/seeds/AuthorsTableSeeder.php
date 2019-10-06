<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        \App\Models\Author::truncate();
        Schema::enableForeignKeyConstraints();

        $authors = [
            [
                'name' => 'Timur Karaçay',
                'slug' => 'timur-karacay',
            ],
            [
                'name' => 'Rıza Çelik',
                'slug' => 'rıza-celik',
            ],
            [
                'name' => 'Yrd. Doç. Dr. Fatih Başçiftçi',
                'slug' => 'fatih-basciftci',
            ],
            [
                'name' => 'Deniz Parlak',
                'slug' => 'deniz-parlak',
            ],
            [
                'name' => 'Kollektif',
                'slug' => 'kollektif',
            ],
            [
                'name' => 'Paul Graham',
                'slug' => 'paul-graham',
            ],
            [
                'name' => 'Serkan Uysal',
                'slug' => 'serkan-uysal',
            ],
            [
                'name' => 'Tugrul Yazar',
                'slug' => 'tugrul-yazar',
            ],
            [
                'name' => 'Nuri Ural',
                'slug' => 'nuri-ural',
            ],
            [
                'name' => 'Ömer Örenç',
                'slug' => 'omer-orenc',
            ],
            [
                'name' => 'Ömer Çıtak',
                'slug' => 'omer-cıtak',
            ]
        ];

        \App\Models\Author::insert($authors);
    }
}
