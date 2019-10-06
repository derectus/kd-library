<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = [
            [
                'name' => 'Güvenlik',
                'slug' => 'guvenlik'
            ],
            [
                'name' => 'Progrmalama',
                'slug' => 'programlama'
            ],
            [
                'name' => 'Diğer',
                'slug' => 'diger'
            ],
            [
                'name' => 'Konferans/Bildiri',
                'slug' => 'konferans-bildiri'
            ],
            [
                'name' => 'Ses/Görsel',
                'slug' => 'ses-görsel'
            ],
            [
                'name' => 'Linux',
                'slug' => 'linux'
            ],
            [
                'name' => 'Windows',
                'slug' => 'windows'
            ]
        ];
        Category::insert($categories);
    }
}
