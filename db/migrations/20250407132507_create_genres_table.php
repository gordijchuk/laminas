<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateGenresTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('genres')
            ->addColumn('name', 'string')
            ->addIndex(['name'], ['unique' => true])
            ->create();
    }
}
