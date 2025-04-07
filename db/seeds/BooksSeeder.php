<?php


use Phinx\Seed\AbstractSeed;

class BooksSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'JavaScript: The Good Parts',
                'publisher_id' => 1,
                'details_id' => 1,
            ],
            [
                'title' => 'Refactoring',
                'publisher_id' => 2,
                'details_id' => 2,
            ],
        ];

        $this->table('books')->insert($data)->saveData();
    }
}
