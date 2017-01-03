<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //delete books table records
        DB::table('books')->delete();
        //insert some dummy records
        DB::table('books')->insert(array(
            array('book_id' => 1,  'title' => 'Hero of the Empire', 'author' => 'Larry Ullman', 'isbn' => '1-56619-909', 'pages_count' => '120', 'published_date' => '2012-12-23',  'language_id' => '1'),
            array('book_id' => 2,  'title' => 'PHP and MySQL for Dynamic Web Sites', 'author' => 'Candice Millard', 'isbn' => '887-985-11', 'pages_count' => '234', 'published_date' => '2015-06-14', 'language_id' => '1'),
            array('book_id' => 3,  'title' => "Murach's PHP and MySQL", 'author' => 'Larry Ullman', 'isbn' => 'AC-25985-54', 'pages_count' => '87', 'published_date' => '2016-06-11', 'language_id' => '1'),
            array('book_id' => 4,  'title' => 'Pratique de MySQL et PHP', 'author' => 'Philippe Rigaux', 'isbn' => '2600478-00', 'pages_count' => '117', 'published_date' => '2013-05-22', 'language_id' => '2'),
            array('book_id' => 5,  'title' => 'El Millón, los viajes de Marco Polo', 'author' => 'Marco Polo', 'isbn' => '11-004-589', 'pages_count' => '120', 'published_date' => '2003-04-04', 'language_id' => '4'),
            array('book_id' => 6,  'title' => 'Learn PHP in 24 Hours or Less', 'author' => 'Candice Millard', 'isbn' => '45cd-58fg', 'pages_count' => '144', 'published_date' => '2011-04-28', 'language_id' => '1'),
            array('book_id' => 7,  'title' => 'PHP for the Web', 'author' => 'Larry Ullman', 'isbn' => '98BR98-00', 'pages_count' => '67', 'published_date' => '2011-04-28', 'language_id' => '1'),
            array('book_id' => 8,  'title' => 'El Nuevo Mundo', 'author' => 'Marco Polo', 'isbn' => null, 'pages_count' => '99', 'published_date' => '2016-11-29',  'language_id' => '4'),
            array('book_id' => 9,  'title' => 'Ancient Rome', 'author' => 'Tardili Nesta', 'isbn' => 'IT98-65200', 'pages_count' => '455', 'published_date' => '2014-12-12', 'language_id' => '5'),
            array('book_id' => 10, 'title' => 'Бусунсул и Паскуалина', 'author' => 'Olesya Tavadze', 'isbn' => null, 'pages_count' => '67', 'published_date' => '2007-01-07', 'language_id' => '3'),
            array('book_id' => 11, 'title' => 'La deuxieme guerre mondiale', 'author' => 'Charles Bruno', 'isbn' => 'CF54-bc99', 'pages_count' => '357', 'published_date' => null, 'language_id' => '2'),
            array('book_id' => 12, 'title' => 'الحرب العالمية الثانية', 'author' => 'عبد الحليم', 'isbn' => '11-23-4502', 'pages_count' => '324', 'published_date' => '1999-02-01', 'language_id' => '6'), 
        
        ));
        
    }

}
