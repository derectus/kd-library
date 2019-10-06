<?php

use Illuminate\Database\Seeder;
use App\Models\BookDetails;

class BookDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book_details = [
            [
                'book_id' => 1,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 2,
                'location_id' => 34,
                'return_date' => '2019-08-01',
                'availability' => 0
            ],
            [
                'book_id' => 3,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 4,
                'location_id' => 34,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 5,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 6,
                'location_id' => 6,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 7,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 8,
                'location_id' => 6,
                'return_date' => '2019-08-01',
                'availability' => 0
            ],
            [
                'book_id' => 9,
                'location_id' => 35,
                'return_date' => '2019-08-01',
                'availability' => 0
            ],
            [
                'book_id' => 10,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 11,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 12,
                'location_id' => 6,
                'return_date' => '2019-08-01',
                'availability' => 0
            ],
            [
                'book_id' => 13,
                'location_id' => 35,
                'return_date' => '2019-08-01',
                'availability' => 0
            ],
            [
                'book_id' => 14,
                'location_id' => 6,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 15,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 16,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ],
            [
                'book_id' => 17,
                'location_id' => 35,
                'return_date' => null,
                'availability' => 1
            ]
        ];


        BookDetails::insert($book_details);

    }
}
