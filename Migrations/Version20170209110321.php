<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Mindy\Bundle\BlockBundle\Model\Block;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170209110321 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable(Block::tableName());
        $table->addColumn('id', 'integer', ['unsigned' => true, 'autoincrement' => true]);
        $table->addColumn('slug', 'string', ['length' => 255]);
        $table->addColumn('content', 'text');
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['slug'], 'slug_uniq');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable(Block::tableName());
    }
}
