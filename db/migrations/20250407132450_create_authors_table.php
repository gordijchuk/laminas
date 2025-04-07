<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateAuthorsTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('authors')
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->create();
    }
}
