<?php


use Phinx\Seed\AbstractSeed;

class BooksGenresSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['book_id' => 1, 'genre_id' => 1],
            ['book_id' => 2, 'genre_id' => 2],
        ];

        $this->table('books_genres')->insert($data)->saveData();
    }
}
