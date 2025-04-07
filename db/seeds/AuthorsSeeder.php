<?php


use Phinx\Seed\AbstractSeed;

class AuthorsSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['first_name' => 'Douglas', 'last_name' => 'Crockford'],
            ['first_name' => 'Martin', 'last_name' => 'Fowler'],
        ];

        $this->table('authors')->insert($data)->saveData();
    }
}
