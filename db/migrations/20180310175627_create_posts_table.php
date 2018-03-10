<?php

use Phinx\Migration\AbstractMigration;

class CreatePostsTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('posts');
        $table->addColumn('title', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('excerpt', 'text', ['null' => true])
            ->addColumn('body', 'text')
            ->addColumn('publish_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addIndex(['slug'], ['unique' => true])
            ->create();
    }
}
