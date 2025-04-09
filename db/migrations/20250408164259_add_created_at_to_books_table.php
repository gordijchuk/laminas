<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddCreatedAtToBooksTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('books')
            ->addColumn('created_at', 'datetime')
            ->update();
    }
}
