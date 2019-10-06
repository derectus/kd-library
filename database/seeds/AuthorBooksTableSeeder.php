<?php

use Illuminate\Database\Seeder;

class AuthorBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_books')->insert(['author_id' => '11', 'book_id' => '1']);
        DB::table('author_books')->insert(['author_id' =>  '5', 'book_id' => '2']);
        DB::table('author_books')->insert(['author_id' =>  '5', 'book_id' => '3']);
        DB::table('author_books')->insert(['author_id' =>  '1', 'book_id' => '4']);
        DB::table('author_books')->insert(['author_id' =>  '9', 'book_id' => '5']);
        DB::table('author_books')->insert(['author_id' => '10', 'book_id' => '5']);
        DB::table('author_books')->insert(['author_id' =>  '3', 'book_id' => '6']);
        DB::table('author_books')->insert(['author_id' =>  '4', 'book_id' => '7']);
        DB::table('author_books')->insert(['author_id' =>  '5', 'book_id' => '8']);
        DB::table('author_books')->insert(['author_id' =>  '5', 'book_id' => '9']);
        DB::table('author_books')->insert(['author_id' =>  '5', 'book_id' => '10']);
        DB::table('author_books')->insert(['author_id' =>  '5', 'book_id' => '11']);
        DB::table('author_books')->insert(['author_id' =>  '6', 'book_id' => '12']);
        DB::table('author_books')->insert(['author_id' =>  '7', 'book_id' => '13']);
        DB::table('author_books')->insert(['author_id' =>  '8', 'book_id' => '14']);
    }
}
