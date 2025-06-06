<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePublishersTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('publishers')
            ->addColumn('name', 'string')
            ->create();
    }
}
