<?php

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::truncate();

        $publishers = [
            [
                'name' => 'Abakus Kitap',
                'slug' => 'abakus-kitap',
            ],
            [
                'name' => 'İnfinity Teknoloji',
                'slug' => 'infinity-teknoloji',
            ],
            [
                'name' => 'Seçkin Yayıncılık',
                'slug' => 'seckin-yayıncılık',
            ],
            [
                'name' => 'Atlas Akademi',
                'slug' => 'atlas-akademi',
            ],
            [
                'name' => 'Kodlab',
                'slug' => 'kodlab',
            ],
            [
                'name' => 'Odtü',
                'slug' => 'odtu',
            ],
            [
                'name' => 'Pusula Yayincilik',
                'slug' => 'pusula-yayincilik',
            ]
        ];

        Publisher::insert($publishers);
    }
}
