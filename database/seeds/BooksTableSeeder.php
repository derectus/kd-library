<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $generator
     * @return void
     */
    public function run(Faker $generator)
    {

        Schema::disableForeignKeyConstraints();
        \App\Models\Book::truncate();
        Schema::enableForeignKeyConstraints();

        $books = [
            [
                'slug' => Str::slug('Ethical Hacking'),
                'title' => 'Ethical Hacking',
                'authors' => json_encode([11]),
                'category_id' => 1,
                'publisher_id' => 1,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Arka Kapı Dergi - 7. Sayı'),
                'title' => 'Arka Kapı Dergi - 7. Sayı',
                'authors' => json_encode([5]),
                'category_id' => 1,
                'publisher_id' => 1,
                'type' => 'Dergi',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Arka Kapı Dergi - 1. Sayı'),
                'title' => 'Arka Kapı Dergi - 1. Sayı',
                'authors' => json_encode([5]),
                'category_id' => 1,
                'publisher_id' => 1,
                'type' => 'Dergi',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Einstein’ın Görelilik Kuramı'),
                'title' => 'Einstein’ın Görelilik Kuramı',
                'authors' => json_encode([1]),
                'category_id' => 3,
                'publisher_id' => 1,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('A\'dan Z\'ye Network Eğitimi'),
                'title' => 'A\'dan Z\'ye Network Eğitimi',
                'authors' => json_encode([0]),
                'category_id' => 5,
                'publisher_id' => 2,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('A\'dan Z\'ye PHP'),
                'title' => 'A\'dan Z\'ye PHP',
                'authors' => json_encode([2]),
                'category_id' => 2,
                'publisher_id' => 3,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('C Programlama Dili'),
                'title' => 'C Programlama Dili',
                'authors' => json_encode([3]),
                'category_id' => 4,
                'publisher_id' => 4,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Centos Sistem ve Sunucu Yonetimi'),
                'title' => 'Centos Sistem ve Sunucu Yonetimi',
                'authors' => json_encode([4]),
                'category_id' => 7,
                'publisher_id' => 5,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Centos Sistem ve Sunucu Yonetimi'),
                'title' => 'Centos Sistem ve Sunucu Yonetimi',
                'authors' => json_encode([4]),
                'category_id' => 7,
                'publisher_id' => 5,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Çırak Dergisi 1. Sayı'),
                'title' => 'Çırak Dergisi 1. Sayı',
                'authors' => json_encode([5]),
                'category_id' => 3,
                'publisher_id' => 1,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Çırak Dergisi 2. Sayı'),
                'title' => 'Çırak Dergisi 2. Sayı',
                'authors' => json_encode([5]),
                'category_id' => 3,
                'publisher_id' => 1,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Çırak Dergisi 2. Sayı'),
                'title' => 'Çırak Dergisi 2. Sayı',
                'authors' => json_encode([5]),
                'category_id' => 3,
                'publisher_id' => 1,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Hackers & Painters Bilgisayar Çağından Büyük Fikirler'),
                'title' => 'Hackers & Painters Bilgisayar Çağından Büyük Fikirler',
                'authors' => json_encode([6]),
                'category_id' => 3,
                'publisher_id' => 6,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Grasshopper Ile Parametrik Modelleme'),
                'title' => 'Grasshopper Ile Parametrik Modelleme',
                'authors' => json_encode([7, 8]),
                'category_id' => 3,
                'publisher_id' => 7,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Grasshopper Ile Parametrik Modelleme'),
                'title' => 'Grasshopper Ile Parametrik Modelleme',
                'authors' => json_encode([7, 8]),
                'category_id' => 3,
                'publisher_id' => 7,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Centos Sistem ve Sunucu Yonetimi'),
                'title' => 'Centos Sistem ve Sunucu Yonetimi',
                'authors' => json_encode([4]),
                'category_id' => 7,
                'publisher_id' => 5,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => Str::slug('Ethical Hacking'),
                'title' => 'Ethical Hacking',
                'authors' => json_encode([11]),
                'category_id' => 1,
                'publisher_id' => 1,
                'type' => 'Kitap',
                'isbn' => $generator->isbn10,
                'edition' => rand(1, 10),
                'publication_year' => $generator->date('Y-m-d'),
                'description' => $generator->sentence(50),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        \App\Models\Book::insert($books);
    }
}
