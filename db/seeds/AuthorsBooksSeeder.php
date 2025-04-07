<?php


use Phinx\Seed\AbstractSeed;

class AuthorsBooksSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['author_id' => 1, 'book_id' => 1],
            ['author_id' => 2, 'book_id' => 2],
        ];

        $this->table('authors_books')->insert($data)->saveData();
    }
}
