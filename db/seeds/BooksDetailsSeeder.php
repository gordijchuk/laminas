<?php


use Phinx\Seed\AbstractSeed;

class BooksDetailsSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['number_of_pages' => 176],
            ['number_of_pages' => 431],
        ];

        $this->table('book_details')->insert($data)->saveData();
    }
}
