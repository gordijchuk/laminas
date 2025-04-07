<?php


use Phinx\Seed\AbstractSeed;

class GenresSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['name' => 'Programming'],
            ['name' => 'Software Engineering'],
        ];

        $this->table('genres')->insert($data)->saveData();
    }
}
