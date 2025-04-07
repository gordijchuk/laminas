<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TestMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('test_table');
        $table->addColumn('test_col', 'string', ['limit' => 100])
            ->create();
    }
}
