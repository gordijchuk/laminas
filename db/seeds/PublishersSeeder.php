<?php


use Phinx\Seed\AbstractSeed;

class PublishersSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['name' => 'O\'Reilly Media'],
            ['name' => 'Penguin Books'],
        ];

        $this->table('publishers')->insert($data)->saveData();
    }
}
